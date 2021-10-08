<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeRequest extends FormRequest
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
            'id_tran'=>'required',
            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:episodes,slug,'.$this->id_episode,
            'link'=>'required|max:255',
            'description_name'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
           'id_tran.required' => 'Dịch không được bỏ trống',
           'name.required' => 'Tên không được bỏ trống',
           'name.max' => 'Tên không quá 255 ký tự',
           'slug.max' => 'Slug không quá 255 ký tự',
            'slug.required' => 'Slug không được bỏ trống',
            'slug.unique' => 'Slug không được trùng',
            'link.required' => 'Đường dẫn không được bỏ trống',
           'link.max' => 'Đường dẫn không quá 255 ký tự',
           'description_name.required' => 'Mô tả tên không được bỏ trống',
           'description_name.max' => 'Mô tả tên không quá 255 ký tự',
        ];
    }
}
