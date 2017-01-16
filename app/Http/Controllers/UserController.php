<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use App\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller {

public function index()
	{
		return view('main');
	}

public function getList()
{
	$user=User::all();		
	return view('admin.user.list',compact('user'));
}

public function getAdd()
{
	$department= Department::all();
	return view('admin.user.add',compact('department'));
}	

public function postAdd(UserRequest $request)
{
	
	$user=new User;
	$user->email=strtolower($request->txtEmail);
	$user->password=Hash::make($request->txtPassword);
	$user->gender=$request->gender;
	$user->firstName=ucfirst($request->txtFirstName);
	$user->lastName=ucfirst($request->txtLastName);
	$user->title=$request->txtTitle;
	$user->designation=$request->txtDesignation;
	$user->joinDate=$request->txtJoinDate;
	$user->dateOfBirth=$request->txtDOB;
	$user->phoneNumber=$request->txtPhone;
	$user->contactName=$request->txtContactName;
	$user->contactPhone=$request->txtContactPhone;
	$user->status="active";
	$user->level=$request->cboLevel;
	$user->deptId=$request->cboDeparment;

	if($request->hasFile('photo'))
	{
		$file=$request->file('photo');
		$name= $file->getClientOriginalName();
		$photo= str_random(4)."_".$name;
		while (file_exists("public/upload/images/users/".$photo)) {
			$photo= str_random(4)."_".$name;
		}
		$file->move("public/upload/images/users/",$photo);
		$user->picture=$photo;
	
	}
	else
	{
		$user->picture="default.jpg";
	}	
	$user->save();
	return redirect('admin/user/add')->with('message','Add Sucessfully');

}	

public function getEdit($id)
{

	$user= User::find($id);
	$department= Department::all();
	return view('admin.user.edit',compact('user','department'));   //['user'=>$user,'department'=>$department]);
}

public function getUserEdit($id)
{

	$user= User::find($id);
	$department= Department::all();
	return view('employee.edit',compact('user','department'));   //['user'=>$user,'department'=>$department]);
}

public function postEdit(userRequest $request,$id)
{
	$user=User::find($id);
	$user->email=strtolower($request->txtEmail);
	if($user->password!=$request->txtPassword)
		$user->password=Hash::make($request->txtPassword);
	$user->gender=$request->gender;
	$user->firstName=ucfirst($request->txtFirstName);
	$user->lastName=ucfirst($request->txtLastName);
	$user->title=$request->txtTitle;
	$user->designation=$request->txtDesignation;
	$user->joinDate=$request->txtJoinDate;
	$user->dateOfBirth=$request->txtDOB;
	$user->phoneNumber=$request->txtPhone;
	$user->contactName=$request->txtContactName;
	$user->contactPhone=$request->txtContactPhone;
	$user->status="active";
	$user->level=$request->cboLevel;
	$user->deptId=$request->cboDeparment;

	if($request->hasFile('photo'))
	{
		$file=$request->file('photo');
		$name= $file->getClientOriginalName();
		if(isset($user->picture))
			if(file_exists("public/upload/images/users/".$user->picture))
				unlink("public/upload/images/users/".$user->picture);

		$photo= str_random(4)."_".$name;
		while (file_exists("public/upload/images/users/".$photo)) {
			$photo= str_random(4)."_".$name;
		}
		$file->move("public/upload/images/users/",$photo);
		$user->picture=$photo;
	}
	/*else
	{
		$user->picture="";
	}*/	
	$user->save();
	return back()->with('message','Edit Sucessfully');
	
	
}

public function getChangeStatus($id)
{
	$user=User::find($id);
	if($user->status=="active")
		$user->status="deactive";
	else 
		$user->status="active";
	$user->save();
	return back()->with('message','Change Sucessfully');
}

public function getLoginAdmin()
{
	return view('admin/login');
}

public function postLoginAdmin(LoginRequest $request)
{
	if(Auth::attempt(['email'=>strtolower($request->txtEmail),'password'=>$request->txtPassword,'status'=>'active' ]))
	{
		if(Auth::user()->level==2)
			return redirect('admin/accesslog/list');
		else
			return redirect('employee/list');
	}
	else
		{
		return redirect('main')->with(["message"=>"login fail",	]);
		}
}


public function getLogoutAdmin()
{
	Auth::logout();
	return redirect('main');
	//return redirect('admin/login');

}
}
