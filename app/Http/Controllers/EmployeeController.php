<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Http\Requests\SendAccessRequest;
use App\Accesslog;
use Illuminate\Support\Facades\Auth;
use App\Resource;

class EmployeeController extends Controller {

public function getList( )
{
	$accesslog=Accesslog::where('userId',Auth::user()->id)->get();	
	return view('employee.list',compact('accesslog'));
}

public function getRequest()
{	
	$resource=Resource::all();
	return view('employee.requestaccess',compact('resource'));
}

public function postSendRequest(SendAccessRequest $request)
{
	$accesslog=new accesslog;	
	$accesslog->userId=Auth::user()->id;
	$accesslog->resId=$request->cboResource;
	$accesslog->requestDate=$request->txtRequestDate;
	$accesslog->reason=$request->txtReason;
	$accesslog->save();
	return back()->with('message','Your request has been send');
}


}
