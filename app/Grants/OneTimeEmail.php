<?php

namespace App\Grants;

use DateInterval;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\Exception\UniqueTokenIdentifierConstraintViolationException;
use League\OAuth2\Server\ResponseTypes\ResponseTypeInterface;
use NextDeveloper\IAM\Authorization\Roles\MemberRole;
use NextDeveloper\IAM\Database\Models\LoginMechanisms;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Services\LoginMechanisms\AbstractLogin;
use NextDeveloper\IAM\Services\LoginMechanisms\ILoginService;
use NextDeveloper\IAM\Services\UsersService;
use Psr\Http\Message\ServerRequestInterface;

class OneTimeEmail extends AbstractLogin implements ILoginService
{
    const LOGINNAME = 'OneTimeEmail';

    /**
     * Here we will create one time email type of login mechanism. To do that we need to first check if we have
     * the mechanism already. To do that we will check the mechanism with user_id. If the mechanism is already
     * created we will return the mechanism, if not we will create and return the mechanism.
     *
     * @param Users $user
     * @return LoginMechanisms
     */
    public function create(Users $user) : LoginMechanisms
    {
        $latestMechanism = self::getLatestMechanism($user);

        if (!$latestMechanism) {
            $latestMechanism = LoginMechanisms::create([
                'iam_user_id'          => $user->id,
                'login_mechanism'  => self::LOGINNAME,
            ]);

            $this->generatePassword($latestMechanism);
        }

        return $latestMechanism;
    }

    /**
     * Creates and responds with authentication token
     *
     * @param ServerRequestInterface $request
     * @param ResponseTypeInterface $responseType
     * @param DateInterval $accessTokenTTL
     * @return ResponseTypeInterface
     * @throws OAuthServerException
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
    public function respondToAccessTokenRequest(ServerRequestInterface $request, ResponseTypeInterface $responseType, DateInterval $accessTokenTTL)
    {
        //  Here we take the client
        $client = $this->validateClient($request);

        //  Here we take the scopes
        $scopes = $this->validateScopes($this->getRequestParameter('scope', $request));

        //  Here we take the username
        $username = $this->getRequestParameter('username', $request);

        //  We take the OTP
        $otp = $this->getRequestParameter('password', $request);

        $user = UsersService::getByEmail($username);

        if(!$user) {
            //  Registering the user
            $user = UsersService::createWithEmail($username);
        }

        $mechanism = self::getLatestMechanism($user);

        //  If we dont have the mechanism, we are creating one.
        if(!$mechanism) {
            $mechanism = self::create($user);
        }

        //  Checking if the user is valid
        $isValid = self::attempt($mechanism, [
            'password'  =>  $otp
        ]);

        if(!$isValid) {
            throw OAuthServerException::invalidCredentials();
        }

        // Issue and persist new tokens
        $accessToken = $this->issueAccessToken($accessTokenTTL, $client, $user->id, $scopes);

        // Inject tokens into response
        $responseType->setAccessToken($accessToken);
        //$responseType->setRefreshToken($refreshToken);

        $this->removeOldTokens($client->getIdentifier(), $accessToken->getIdentifier(), $user->id);

        // We need to make role checking here. If the role is not assigned to user, we need to assign member role
        UsersService::assignUserToRole($user, new MemberRole());

        return $responseType;
    }

    /**
     * Returns the identifier of the grant
     *
     * @return string grant type
     */
    public function getIdentifier()
    {
        return 'otp_email';
    }

    /**
     * Generates a password and updates the login mechanism objects
     *
     * @param LoginMechanisms $mechanism
     * @return string
     */
    public function generatePassword(LoginMechanisms $mechanism) : string
    {
        /**
         * For this service we will be sending an email to the user so that the user knows his/her password for the
         * login.
         */

        $password = random_int(100000, 999999);

        $algo = $this->getAvailableHashAlgorithm();

        $hashedPassword = $this->hashPassword($password);

        $updateMechanismLoginData = $mechanism->update([
            'login_data'    => [
                'passwordHash'  =>  $hashedPassword,
                'tempPassword'  =>  $password
            ]
        ]);

        return $hashedPassword;
    }

    /**
     * Here we check if the user credentials are correct. Even if the credentials are correct or not we will log
     * this attempt.
     *
     * @param LoginMechanisms $mechanism
     * @param string $password Password of the login mechanism
     * @return true
     */
    public function attempt(LoginMechanisms $mechanism, $password) : bool
    {
        $loginData = json_decode($mechanism->login_data, true);

        if(is_array($password)) {
            $password = $password['password'];
        }

        $isVerified = password_verify($password, $loginData['passwordHash']);

        if(!$isVerified) {
            return false;
        }

        $user = \App\Database\Models\Users::where('id', $mechanism->iam_user_id)->first();

        return true;
    }

    /**
     * Returns the mechanism name
     *
     * @param Users $user
     * @param $mechanismName
     * @return LoginMechanisms|null
     */
    public static function getLatestMechanism(Users $user, $mechanismName = self::LOGINNAME) : ?LoginMechanisms
    {
        $mechanism = parent::getLatestMechanism($user, $mechanismName);

        return $mechanism;
    }
}