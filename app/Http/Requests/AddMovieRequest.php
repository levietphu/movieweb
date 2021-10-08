<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMovieRequest extends FormRequest
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
            'slug'=>'required|max:255|unique:movies',
            'status'=>'required',
            'id_release_time'=>'required',
            'id_national'=>'required',
            'image'=>'required',
            'type'=>'required',
            'content'=>'required',
            'id_cate'=>'required',
            'id_tran'=>'required',
            'id_actor'=>'required',
            'movie_duration'=>'required',
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
            'image.required' => 'Ảnh không được bỏ trống',
            'type.required' => 'Kiểu không được bỏ trống',
            'content.required' => 'Nội dung không được bỏ trống',
            'id_cate.required' => 'Thể loại không được bỏ trống',
            'id_tran.required' => 'Dịch và chất lượng không được bỏ trống',
            'id_actor.required' => 'Diễn viên không được bỏ trống',
            'movie_duration.required' => 'Thời lượng phim không được bỏ trống',
        ];
    }
}
