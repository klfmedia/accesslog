<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Http\Requests\accesslogRequest;
use App\Accesslog;
use App\User;
class AccesslogController extends Controller {
	
public function getList()
{
	$userActive=User::where('status','active')->select('id')->get()->toArray();
	$accesslog=Accesslog::where('accStatus',0)->whereIn('userId',$userActive)->get();
	calculateRequest();
	return view('admin.accesslog.list',compact('accesslog'));
}

public function getListDeny()
{
	$userActive=User::where('status','active')->select('id')->get()->toArray();
	$accesslog=Accesslog::where('accStatus',2)->whereIn('userId',$userActive)->get();
	calculateRequest();
	return view('admin.accesslog.listdeny',compact('accesslog'));
}

public function getListAccept()
{
	$userActive=User::where('status','active')->select('id')->get()->toArray();
	$accesslog=Accesslog::where('accStatus',1)->whereIn('userId',$userActive)->get();
	calculateRequest();
	return view('admin.accesslog.listaccept',compact('accesslog'));
}

public function getAdd()
{
	return view('admin.accesslog.add');
}	

public function getDeny($id)
{

	$accesslog= accesslog::find($id);
	$accesslog->accStatus=2;
	$accesslog->save();
	return back();
}

public function getAccept($id)
{
	$accesslog= accesslog::find($id);
	$accesslog->accStatus=1;
	$accesslog->save();
	return back();
}

public function postEdit(accesslogRequest $request,$id)
{
	
	$accesslog= accesslog::find($id);
	$accesslog->deptName=$request->txtDeptName;
	$accesslog->deptLocation=$request->txtDeptLocation;
	$accesslog->deptDescription=$request->txtDeptDesc;
	$accesslog->save();
	return redirect('admin/accesslog/edit/'.$id)->with('message','Edit Sucessfully');
	
}


}
