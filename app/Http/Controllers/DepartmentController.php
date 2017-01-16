<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Http\Requests\DepartmentRequest;
use App\Department;
class DepartmentController extends Controller {

public function getList()
{
	$department=Department::all();
	return view('admin.department.list',compact('department'));
}

public function getAdd()
{
	return view('admin.department.add');
}	

public function postAdd(DepartmentRequest $request)
{
	
	$department=new Department;
	$department->deptName=ucfirst($request->txtDeptName);
	$department->deptLocation=$request->txtDeptLocation;
	$department->deptDescription=$request->txtDeptDesc;
	$department->save();
	return redirect('admin/department/add')->with('message','Add Sucessfully');

}	

public function getEdit($id)
{

	$department= Department::find($id);
	return view('admin.department.edit',compact('department'));
}

public function postEdit(DepartmentRequest $request,$id)
{
	
	$department= Department::find($id);
	$department->deptName=ucfirst($request->txtDeptName);
	$department->deptLocation=$request->txtDeptLocation;
	$department->deptDescription=$request->txtDeptDesc;
	$department->save();
	return redirect('admin/department/edit/'.$id)->with('message','Edit Sucessfully');
	
}

public function getDelete($id)
{
	$department= Department::find($id);
	$department->delete($id);	
	return redirect('admin/department/list')->with('message','Delete Sucessfully');
}

}
