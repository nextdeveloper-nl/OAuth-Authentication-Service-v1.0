# Authentication

NextDeveloper OAuth server has multiple security levels to create a secure centralized OAuth mechanism. Apart from the OAuth standardization we are practicing certain features to make the lives of developers and customers easier.

## Registration of users

NextDeveloper Auth mechanism has a built in easy to use registration system where the developer dont need to register a user to make a login. The registration takes place in the background automatically. The registration process takes place with the steps below;

The developer sends a request to {authentication-url}/get-logins?email={email-address} and the application executes the steps below;

```
// To register and create a one time password using email, send a request to the url below;
URL: GET https://{authentication-server}/get-logins?email={email-address}

//  This will return you a response below;
{
   "logins" : [
       "OneTimeEmail"
   ]
}
```

This response means that the customer has a OneTimeEmail password grant with will accept one time use 
