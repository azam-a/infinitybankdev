<?php namespace App\Http\Requests\kb;

use App\Http\Requests\Request;
use Response;
class CategoryRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			//'name' => 'required',
			'name' => 'required|unique:kb_category',
			'slug' => 'required|unique:kb_category',
			'description' => 'required',

		];
	}
	
	#### OPTIONAL RESPONSE ####
	public function response(array $errors)
	{
		$errors['response'] = 0;
		return Response::json ( array (
				'errors' => $errors
		) );
			
	}

	#### OPTIONAL AUTHORIZE FORBIDDEN  ####
	public function forbiddenResponse()
	{
		return Response::json ( array (
				'response' => 0,
				'errors' => array('custom_msg'=>'Forbidden Action.')
		) );
	}

}
