<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
                'title'=>'required',
                'content'=>'required',
                'image'=>"required",
                'status'=>'required',
              ];
    }
    public function messages()
    {
        return [
            'title.required'=> 'Nhập tiêu đề bài viết',
            'content.required'=> 'Nhập nội dung bài viết',
            'image.required'=>'chọn ảnh bài bài viết',
            'status.required'=>'chọn trạng thái bài viết',
        ];
    }
}

