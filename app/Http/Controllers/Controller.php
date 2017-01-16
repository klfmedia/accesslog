<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Notice;
abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	function __construct()
	{
		$this->login();
	}

	function login()
	{
		if(Auth::check())
		{
			$notice=Notice::where('expireDate','>=',date("Y-m-d"))->where('notifyDate','<=',date("Y-m-d")) ->get();;
			view()->share('notice',$notice); 
		}

	}





}
