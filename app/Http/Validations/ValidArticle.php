<?php

namespace App\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;

class ValidArticle extends FormRequest
{
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
				$title_rule_addition = request()->article ? ','.request()->article : '';
        return [
						'description' => 'required|between:50,210',
						'sample' => 'required|between:300,700',
						'title' => 'sometimes|required|between:10,700|unique:articles,title'.$title_rule_addition,
						'file_photo' => 'sometimes|required|mimes:jpeg,bmp,png,gif,tif',
						'content' => 'required',
						'category' => 'required',
						'tags' => 'required|between:3,210'
        ];
    }
}
