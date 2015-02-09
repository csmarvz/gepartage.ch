<?php

class UserController extends BaseController {

	public function index()
	{
	}
	
	public function store()
	{
		$data = Input::all();
		
		
        $rules = array(
            'firstname' => 'required',
            //'lastname' => 'required',
			//'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:password_confirmation',
			//'address' => 'required',
			'zip' => 'required|integer|between:1200,1299'
        );
        
        $messages = array(
            'firstname.required' => "N'oublie pas ton prénom !",
            'lastname.required' => "N'oublie pas ton nom de famille !",
            'phone.required' => "N'oublie pas ton numéro de téléphone !",
            'email.required' => "N'oublie pas ton adresse email !",
            'email.email' => "Attention, le format de l'email est xxx@yyy.zzz",
            'email.unique' => "Malheureusement, l'adresse email que tu as saisie est déjà utilisée.",
			'password.required' => "N'oublie pas ton mot de passe !",
            'password.same' => "Attention! Ton mot de passe et la confirmation doivent être identiques",
            'zip.required' => "N'oublie pas ton numéro postal !",
			'zip.integer' => "Désolé, il te faut une adresse à Genève avec un numéro postal valide",
			'zip.between' => "Désolé, il te faut une adresse à Genève avec un numéro postal valide"
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails())
        {
            return Redirect::to('/')->withErrors($validator)->withInput();
        }
		
		unset($data['password_confirmation']);
		
		$data['password'] = Hash::make($data['password']);
		$user = User::create($data);
		
		
		Auth::login($user);
		return Redirect::to('')->with('success','Bravo '. $user->firstname . ', ton compte a bien été créé ! Tu peux maintenant utiliser notre plateforme pour partager des objets.');
	}
	
	public function storeCategories(){
		$data = Input::get('categories');
		if($data){
			Auth::user()->categories()->sync($data);
		}else {
			Auth::user()->categories()->sync([]);
		}
	
		return Redirect::to('profil');
	}
	
	public function show()
	{
	}
	public function edit()
	{
	}
	public function create()
	{
	}
	public function update($id)
	{
		
		
		$data = Input::all();
		
		
		
		if(isset($data['password']) && $data['password']!=""){
			$data['password'] = Hash::make($data['password']);
		}else{
			unset($data['password']);
		}
		
		$object_update = false;
		if($data['objects_update']) {
			$object_update = true;
			if(isset($data['objects_array'])){
				Auth::user()->objects()->sync($data['objects_array']);
				unset($data['objects_array']);
			}else {
				Auth::user()->objects()->sync([]);
			}
		}
		
		unset($data['objects_update']);
		
		Auth::user()->update($data);
		if($object_update) {
			return Redirect::to('profil/mes_objets')->with('success','Les objets que tu peux partager ont bien été mis à jour !');;
		}
		return Redirect::to('profil')->with('success','Ton profil a été mis à jour avec succès !');;
	}
	public function destroy()
	{
	}
	public function login()
	{
	}

}
