<?php

class AuthController extends BaseController {

	public function masquerade() {
		$user_id = Input::get('user_id');
		$user = User::find($user_id);
		Auth::login($user);
		return Redirect::to('')->with('success',"Tu es connecté en tant que $user->firstname $user->lastname");
	}

    public function showLogin()
    {
        // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('')->with('success', 'Déjà connecté');
        }

        // Show the login page
        return View::make('auth.login');
    }
    
    public function postLogin()
    {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'email'  => 'Required',
            'password'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);
		
        // Check if the form validates with success.
        if ($validator->passes())
        {
			
            // Try to log the user in.
            if (Auth::attempt($userdata))
            {
                // Redirect to homepage
                return Redirect::to('')->with('success', "Tu t'es bien connecté!");
            }
            else
            {
                // Redirect to the login page.
                return Redirect::to('connexion')->withErrors(array('password' => "Attention, ton email ou ton mot de passe n'est pas correct."))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('connexion')->withErrors("Attention, ton email ou ton mot de passe n'est pas correct.")->withInput(Input::except('password'));
    }
    
     public function getLogout()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('')->with('success', 'Déconnexion réussie, à bientôt!');
    }
}