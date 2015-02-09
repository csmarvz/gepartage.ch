<?php

class DiscussionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$data = Input::all();
		
        $rules = array(
            'title' => 'required'
        );
        
        $messages = array(
            'title.required' => "N'oublie pas le titre de ta discussion !"
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails())
        {
            return Redirect::to(URL::previous())->withErrors($validator)->withInput();
        }
		
		$discussion = new Discussion();
		$discussion->title = Input::get('title');
		$discussion->user_id = Auth::id();
		$discussion->save();
		
		
		return Redirect::to("forum/$discussion->id")->with('success',"Ta discussion a bien été créée ! Tu peux à présent y écrire des messages");
	}
	
	public function storeMessage()
	{
		
		$data = Input::all();
		
        $rules = array(
            'message' => 'required'
        );
        
        $messages = array(
            'message.required' => "N'oublie pas ton message !"
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails())
        {
            return Redirect::to(URL::previous())->withErrors($validator)->withInput();
        }
		
		$message = new DiscMessage();
		$message->message = Input::get('message');
		$message->user_id = Auth::id();
		$message->discussion_id = Input::get('discussion_id');
		$message->save();
		
		
		return Redirect::to("forum/$message->discussion_id")->with('success',"Ton message a bien été envoyé !");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
