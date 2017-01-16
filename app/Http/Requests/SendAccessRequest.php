<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendAccessRequest extends Request {

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
				"txtRequestDate"=>"required|date|after:today",
				"txtReason"=>"required",
				"cboResource"=>"required",
			];				
	}

	public function messages(){
		return [
			'txtRequestDate.required'=>'Please enter date request',
			'txtRequestDate.date'=>'Please enter right format of date request',
			'txtRequestDate.after'=>'The date request must be after today',
			'txtReason.required'=>'Please enter the reason',
			"cboResource.required"=>"Please choose the resource to request",
			];
	}

}
