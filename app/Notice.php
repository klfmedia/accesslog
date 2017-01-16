<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	protected $table='notices';
	protected $fillable = ['notifyDate','expireDate','description','level'];
	public $timestamps=false;


}
