<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NoticeRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		// check when we add
		
		return 
			[
				"txtNotifyDate"=>"required|date|after:yesterday",
				"txtExpireDate"=>"required|date|after:today|after:txtNotifyDate",
				"txtDescription"=>"required",
			];	
		
		

	}

	public function messages(){
		return [
			'txtNotifyDate.required'=>'Please enter date Notify',
			'txtNotifyDate.date'=>'Please enter right format of date',
			'txtNotifyDate.after'=>'The date Notify must be after today',
			'txtExpireDate.after'=>'The date Expire must be after tomorrow',
			'txtExpireDate.after'=>'The date Expire must be after notify date ',
			'txtDescription.required'=>'Please enter the Description',
			
			];
	}

}
