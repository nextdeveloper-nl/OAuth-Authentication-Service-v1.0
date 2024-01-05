<?php

namespace App\Helpers;
class LoginResponse
{
    private $response = '';

    private $redirectTo;

    private $showTwoFA = false;

    private $isLoggedIn = false;

    public function buildResponse() {
        return [
            'response'      =>  $this->response,
            'redirectTo'    =>  $this->redirectTo ? $this->redirectTo : env('DEFAULT_REDIRECT_URI'),
            'showTwoFA'     =>  $this->showTwoFA,
            'isLoggedIn'    =>  $this->isLoggedIn
        ];
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getRedirectTo()
    {
        return session()->get('oauth')['redirect_uri'];
    }

    /**
     * @param mixed $redirectTo
     */
    public function setRedirectTo($redirectTo): void
    {
        $this->redirectTo = $redirectTo;
    }

    /**
     * @return mixed
     */
    public function getShowTwoFA()
    {
        return $this->showTwoFA;
    }

    /**
     * @param mixed $showTwoFA
     */
    public function setShowTwoFA($showTwoFA): void
    {
        $this->showTwoFA = $showTwoFA;
    }

    /**
     * @return mixed
     */
    public function getIsLoggedIn()
    {
        return $this->isLoggedIn;
    }

    /**
     * @param mixed $isLoggedIn
     */
    public function setIsLoggedIn($isLoggedIn): void
    {
        $this->isLoggedIn = $isLoggedIn;
    }

}