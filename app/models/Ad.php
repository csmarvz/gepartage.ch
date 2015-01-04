<?php


class Ad extends Eloquent {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ads';
	protected $guarded = ['id'];
	
	public function category(){
		return $this->belongsTo('Category');
	}


}
