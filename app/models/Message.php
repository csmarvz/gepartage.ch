<?php


class Message extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';
	
	protected $guard = array('id');
	
	public function sender() {
		return $this->belongsTo('User','sender_id');
	}
	
	public function receiver() {
		return $this->belongsTo('User','receiver_id');
	}
	
	public function object() {
		return $this->belongsTo('Object');
	}
	
	


}
