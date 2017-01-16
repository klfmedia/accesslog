<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model {

	protected $table='resources';
	protected $fillable = ['resName','resDescription'];
	public $timestamps=false;

	public function accesslog(){
		return $this->hasMany('App\Accesslog','resId');
	}
}
