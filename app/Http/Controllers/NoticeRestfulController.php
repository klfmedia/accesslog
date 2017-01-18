<?php namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Notice;
class NoticeRestfulController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($format)
	{
		$notice= Notice::all();
		//return response()->json($notice);		
		switch (strtolower($format))
		 {
			case 'xml':
				{
					$notice= $notice->toArray();
					// creating object of SimpleXMLElement
					$xml_data = new \SimpleXMLElement('<?xml version="1.0"?><Notice></Notice>');
					// creating object of SimpleXMLElement
					array_to_xml($notice,$xml_data);
					$status=200;
					$value="text/xml";
					return response($xml_data->asXML(),$status)->header('Content-Type',$value);
				}
			case 'json':
			{
				$notice= $notice->toArray();
				return response()->json($notice);
			}
			default:
				return view('admin.notice.list',compact('notice'));				
		}	
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("admin.notice.add");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NoticeRequest $request)
	{
		$notice = new Notice();
		$notice->notifyDate=$request->txtNotifyDate;
		$notice->expireDate=$request->txtExpireDate;
		$notice->description=$request->txtDescription;
		$notice->level=$request->ckbLevel;
		$notice->save();
		return back()->with('message','Your Notify has been set');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($format,$id)
	{
			$notice= Notice::find($id);
		//return response()->json($notice);		
		switch (strtolower($format))
		 {
			case 'xml':
				{
					$notice= $notice->toArray();
					// creating object of SimpleXMLElement
					$xml_data = new \SimpleXMLElement('<?xml version="1.0"?><Notice></Notice>');
					// creating object of SimpleXMLElement
					array_to_xml($notice,$xml_data);
					$status=200;
					$value="text/xml";
					return response($xml_data->asXML(),$status)->header('Content-Type',$value);
				}
			case 'json':
			{
				$notice= $notice->toArray();
				return response()->json($notice);
			}
		}
	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($format,$id)
	{
		$notice= Notice::find($id);
		
		return view('admin.notice.edit',compact('notice'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(NoticeRequest $request,$format,$id)
	{
		$notice= Notice::find($id);
		$notice->notifyDate=$request->txtNotifyDate;
		$notice->expireDate=$request->txtExpireDate;
		$notice->description=$request->txtDescription;
		$notice->level=$request->ckbLevel;
		$notice->save();
		return back()->with('message','Your Notify has been modified');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($format,$id)
	{
		$notice= Notice::find($id);
		$notice->delete();
		return back()->with('message','Notice has been deleted');
	}

}
