<?php


class Discussion extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'discussions';
	
	protected $guard = array('id');
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	public function messages() {
		return $this->hasMany('DiscMessage');
	}


}
