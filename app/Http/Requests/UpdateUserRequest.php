<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'group_id'=>"required",
          ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Nhập tên nhân viên',
            'email.required'=> 'Trường email là bắt buộc',
            'email.unique'=>'Email đã được đăng ký',
            'group_id.required'=>'Chọn chức vụ của nhân viên',
        ];
    }
}
