<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'txtUser' => 'required|min:4|unique:users,username',
            'txtPass' => 'required|min:6',
            'txtPassConf' => 'required|same:txtPass',
            'txtEmail' => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'txtUser.required' => 'Chưa nhập tên đăng nhập',
            'txtUser.min' => 'Tên đăng nhập phải từ 4 ký tự trở lên',
            'txtUser.unique' => 'Tên đăng nhập đã tồn tại',
            'txtPass.required' => 'Chưa nhập mật khẩu',
            'txtPass.min' => 'Mật khẩu phải từ 6 ký tự trở lên',
            'txtPassConf.required' => 'Chưa nhập mật khẩu xác nhận',
            'txtPassConf.same' => 'Mật khẩu xác nhận sai',
            'txtEmail.required' => 'Chưa nhập email',
            'txtEmail.email' => 'Email không đúng định dạng',
            'txtEmail.unique' => 'Email đã tồn tại',
        ];
    }

}
