<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
		if ($this->is('admin/user/add'))
		{
			
		return 
			[
				'txtEmail'=>'required|email|unique:Users,email',
				'txtDOB'=>'date',
				'txtJoinDate'=>'date',
				'photo'=>'image', // remember enable php_extension in php extension
			];
		}
		// check when we edit
		return 
			[
				'txtEmail'=>'required|email|unique:Users,email,'.$this->id,
			];

			
	}

	public function messages(){
		return [
			'txtEmail.required'=>'Please enter Email',
			'txtEmail.email'=>'Wrong Email format',
			'txtEmail.unique'=>'Duplicate Email',
			'txtDOB'=>'Please check the date of birth',
			'txtJoinDate'=>'Please check the date of birth',
			'photo.image'=>'File not an image',
			];
	}

}
