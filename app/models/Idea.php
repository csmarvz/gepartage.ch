<?php


class Idea extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ideas';
	
	protected $guard = array('id');
	
	public function votes() {
		return $this->belongsToMany('User','votes');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}


}
