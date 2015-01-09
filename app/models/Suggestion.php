<?php


class Suggestion extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'suggestions';
	
	protected $guard = array('id');
	
	public function user() {
		return $this->belongsTo('User');
	}


}
