<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResourceRequest extends Request {

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
		if ($this->is('admin/resource/add'))
		{
		
		return 
			[
				'txtResName'=>'required|min:3|max:100|unique:Resources,resName',
				
			];
		}
		// check when we edit
		return 
			[
				'txtResName'=>'required|min:3|max:100|unique:Resources,resName,'.$this->id,
			];

			
	}

	public function messages(){
		return [
			'txtResName.required'=>'Please enter Resource Name',
			'txtResName.min'=>'Ressource Name must have atleast 3 character',
			'txtResName.max'=>'Resource Name must have maximum 100 character',
			'txtResName.unique'=>'Duplicate Resource Name',
			
			];
	}

}
