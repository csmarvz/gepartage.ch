<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
		$correspondents = Auth::user()->correspondents();
				
		return View::make('user.messages',compact('correspondents'));
	}


	public function showByUser($userId){
		
		$messages = Message::where('messages.receiver_id', '=', $userId)->where('messages.sender_id', '=', Auth::id())->get();
		$messages = $messages->merge(Message::where('messages.sender_id', '=', $userId)->where('messages.receiver_id','=',Auth::id())->get());
		//$messages= Message::where('messages.sender_id', '=', $userId)->where('messages.receiver_id','=',Auth::id())->get();
		
		$correspondents = User::all();
		
		
					
		return View::make('user.messages',compact('messages','correspondents'));
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
		$message = new Message();
		//$message->title = $data['title'];
		$message->body = $data['body'];
		$message->receiver_id = $data['receiver_id'];
		$message->object_id = $data['object_id'];
		$message->sender_id = Auth::id();
		$message->save();
		
		$receiver = User::find($message->receiver_id);
		
		return Redirect::to('messages/envoi')->with('success',"Ton message a bien été envoyé à $receiver->firstname");
		
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
