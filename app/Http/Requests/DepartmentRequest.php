<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request {

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
		if ($this->is('admin/department/add'))
		{
			
		return 
			[
				'txtDeptName'=>'required|min:3|max:100|unique:Departments,deptName',
			];
		}
		// check when we edit
		return 
			[
				'txtDeptName'=>'required|min:3|max:100|unique:Departments,deptName,'.$this->id,
			];

			
	}

	public function messages(){
		return [
			'txtDeptName.required'=>'Please enter Department Name',
			'txtDeptName.min'=>'Department Name must have atleast 3 character',
			'txtDeptName.max'=>'Department Name must have maximum 100 character',
			'txtDeptName.unique'=>'Duplicate Department Name',
			];
	}

}
