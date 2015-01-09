<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function objects(){
		return $this->belongsToMany('Object','user_object');
	}
	
	public function ads(){
		return $this->hasMany('Ad');
	}
	
	public function messagesSent(){
		return $this->hasMany('Message','sender_id');
	}
	
	public function messagesReceived(){
		return $this->hasMany('Message','receiver_id');
	}
	
	public function correspondents() {
		
		$users = DB::table('users')
			->join('messages', function($join)
			        {
			            $join->on('users.id', '=', 'messages.sender_id')
							->orOn('users.id', '=', 'messages.receiver_id');
			        })->where(function($query)
					{
						$query->where('messages.sender_id', '=', Auth::id())->orWhere('messages.receiver_id', '=', Auth::id());
					
					})
						
						
						
						->where('users.id','!=',Auth::id())->groupBy('users.id')->distinct()->get();
					
					
		
		return $users;
		
	}
	
	
	public function hasObject($id){
		$object = $this->objects->find($id);
		
		if($object) return true;
		return false;
	}

}
