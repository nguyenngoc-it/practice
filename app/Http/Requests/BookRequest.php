<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        return [
            'name'=>'bail|required|unique:books,name',
            'image'=>'bail|required',
            'author'=>'bail|required',
            'price'=>'bail|required',
            'description'=>'bail|required'
        ];
    }
    public function messages()
    {
        return [
          'name.required'=>'Tên không được để trống',
            'name.unique'=>'Tên không được trùng lặp',
            'image.required'=>'image không được để trống',
            'author.required'=>'tác giả không được để trống',
            'price.required'=>'giá không được để trống',
            'description.required'=>'mô tả không được để trống'
        ];
    }
}
