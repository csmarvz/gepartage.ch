<?php


class Object extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'objects';
	
	protected $guard = array('id');
	
	public function users() {
		return $this->belongsToMany('User','user_objects');
	}


}
