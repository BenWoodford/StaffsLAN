<?php

class Controller_Auth extends Controller_Base {

	public function action_go($provider = null)
	{
    // bail out if we don't have an OAuth provider to call
    	if ($provider === null)
    	{
    		echo 'no provider?';
	        //\Messages::error(__('login-no-provider-specified'));
        	//\Response::redirect_back();
        	return new Response();
    	} else
	    // load Opauth, it will load the provider strategy and redirect to the provider
	    	\Auth_Opauth::forge();
	}

	public function action_callback()
    {
        // Opauth can throw all kinds of nasty bits, so be prepared
        try
        {
            // get the Opauth object
            $opauth = \Auth_Opauth::forge(false);

            // and process the callback
            $status = $opauth->login_or_register();
            // fetch the provider name from the opauth response so we can display a message
            $provider = $opauth->get('auth.provider', '?');

            $done = false;

            // deal with the result of the callback process
            switch ($status)
            {
                // a local user was logged-in, the provider has been linked to this user
                case 'linked':
                    // inform the user the link was succesfully made
                    //\Messages::success(sprintf(__('login.provider-linked'), ucfirst($provider)));
                    // and set the redirect url for this status
                	echo 'linked!';
                    $url = '';
                    $done = true;
                break;

                // the provider was known and linked, the linked account as logged-in
                case 'logged_in':
                    // inform the user the login using the provider was succesful
                    //\Messages::success(sprintf(__('login.logged_in_using_provider'), ucfirst($provider)));
                    // and set the redirect url for this status
                    $url = '';
                    echo 'logged in';
                    $done = true;
                break;

                // we don't know this provider login, ask the user to create a local account first
                case 'register':
                    // inform the user the login using the provider was succesful, but we need a local account to continue
                    //\Messages::info(sprintf(__('login.register-first'), ucfirst($provider)));
                    // and set the redirect url for this status
                    //$url = 'users/register';
                    echo 'register';
                break;

                // we didn't know this provider login, but enough info was returned to auto-register the user
                case 'registered':
                    // inform the user the login using the provider was succesful, and we created a local account
                    //\Messages::success(__('login.auto-registered'));
                    // and set the redirect url for this status
                    $url = '';
                    echo 'registered';
                    $done = true;
                break;

                default:
                    throw new \FuelException('Auth_Opauth::login_or_register() has come up with a result that we dont know how to handle.');
            }

            // Update profile info
            if($done) {                
                $current_user = Model_User::getCurrentUser();

                if($current_user != null) {
                    $current_user->student_number = $opauth->get('auth.raw.user_fields.StudentNumber');
                    $current_user->steam = $opauth->get('auth.raw.user_fields.steam');
                    $current_user->avatar_url = $opauth->get('auth.raw.user.links.avatar');
                    $current_user->save();
                }
            }

            // redirect to the url set
            \Response::redirect($url);
        }

        // deal with Opauth exceptions
        catch (\OpauthException $e)
        {
            echo "<h2>OAuth2 Error!</h2>";
        	echo $e->getMessage();
            //\Messages::error($e->getMessage());
            //\Response::redirect_back();
        }

        // catch a user cancelling the authentication attempt (some providers allow that)
        catch (\OpauthCancelException $e)
        {
            // you should probably do something a bit more clean here...
            exit('It looks like you canceled your authorisation.'.\Html::anchor('users/oath/'.$provider, 'Click here').' to try again.');
        }
        return new Response();

	}
}