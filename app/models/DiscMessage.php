<?php


class DiscMessage extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'disc_messages';
	
	protected $guard = array('id');
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	public function discussion() {
		return $this->belongsTo('Discussion');
	}


}
