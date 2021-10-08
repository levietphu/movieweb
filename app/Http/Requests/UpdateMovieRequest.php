<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'name'=>'required|max:255',
            'substitute_name'=>'required|max:255',
            'slug'=>'required|max:255|unique:movies,slug,'.$this->movie,
            'status'=>'required',
            'id_release_time'=>'required',
            'id_national'=>'required',
            'image'=>'required',
            'type'=>'required',
            'content'=>'required',
        ];
    }
    public function messages()
    {
        return [
           'name.required' => 'Tên không được bỏ trống',
           'name.max' => 'Tên không quá 255 ký tự',
           'substitute_name.required' => 'Tên thay thế không được bỏ trống',
           'substitute_name.max' => 'Tên thay thế không quá 255 ký tự',
           'slug.max' => 'Slug không quá 255 ký tự',
            'slug.required' => 'Slug không được bỏ trống',
            'slug.unique' => 'Slug không được trùng',
            'status.required' => 'Trạng thái không được bỏ trống',
            'id_release_time.required' => 'Năm phát hành không được bỏ trống',
            'id_national.required' => 'Quốc gia không được bỏ trống',
            'image.required' => 'Quốc gia không được bỏ trống',
            'type.required' => 'Kiểu không được bỏ trống',
            'content.required' => 'Nội dung không được bỏ trống',
        ];
    }
}
