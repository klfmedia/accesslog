<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\ResourceRequest;
use App\Resource;
class ResourceController extends Controller {

public function getList()
{
	$resource=Resource::all();
	return view('admin.resource.list',compact('resource'));
}

public function getAdd()
{
	return view('admin.resource.add');
}	

public function postAdd(ResourceRequest $request)
{
	$resource=new Resource;
	$resource->resName=ucfirst($request->txtResName);
	$resource->resDescription=$request->txtResDesc;
	$resource->save();
	return redirect('admin/resource/add')->with('message','Add Sucessfully');
}	

public function getEdit($id)
{
	$resource= Resource::find($id);
	return view('admin.resource.edit',compact('resource'));

}

public function postEdit(ResourceRequest $request,$id)
{
	$resource= Resource::find($id);
	$resource->resName=ucfirst($request->txtResName);
	$resource->resDescription=$request->txtResDesc;
	$resource->save();
	return redirect('admin/resource/edit/'.$id)->with('message','Edit Sucessfully');
	
}

public function getDelete($id)
{
	$resource= Resource::find($id);
	$resource->delete($id);	
	return redirect('admin/resource/list')->with('message','Delete Sucessfully');
}

}
