<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

	protected $table='departments';
	protected $fillable = ['resId','deptName','deptLocation','deptDescription'];
	public $timestamps=false;

public function users(){
	return $this->hasMany('App\User');
}
}
