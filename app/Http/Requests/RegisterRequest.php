<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required | min:8',
            'Confirm_password' => 'same:password',
            'email' => 'required | email | unique:users'
        ];
    }

    public function messages()
    {
        return [
            'Username.required' => 'Vui lòng nhập tên đăng nhập',
            'name.required' => 'Vui lòng nhập tên hiển thị',
            'password.required' => 'Vui lòng xác mật khẩu',
            'Confirm_password.same' => 'Xác nhận sai mật khẩu',
//            'Confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng đúng định dạng @',
            'email.unique' => 'Đã tồn tại email'
        ];
    }
}
