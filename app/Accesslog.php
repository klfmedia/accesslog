<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Accesslog extends Model {

protected $table='accesslogs';
protected $fillable = ['resId','userId','sendDate','requestDate','reason','accStatus'];
public $timestamps=false;

public function user(){
		return $this->belongsTo('App\User','userId');
	}

public function resource(){
		return $this->belongsTo('App\Resource','resId');
	}

}
