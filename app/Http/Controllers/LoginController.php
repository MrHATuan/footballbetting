<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DateTime;


class LoginController extends Controller
{

    public function getLogin () {
        if (!Auth::check()) {
    	   return view('login.login');
        } else {
            $id=Auth::id();
            $user = User::find($id);
            if ($user['level'] == 0) {
                return redirect('user');
            } else {
                return redirect('admin');
            }
        }
    }

    public function postLogin (LoginRequest $request) {
        $credentials = [
            'username' => $request->txtUser, 
            'password' => $request->txtPass, 
        ];
        if ( ! Auth::attempt($credentials))
        {
            return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Đăng nhập không thành công']);
        }
        if (Auth::user()->level == 0)
        {
            return redirect('user')->with(['flash_level' => 'result_msg', 'flash_message' => 'Đăng nhập thành công']);
        }
            return redirect('admin')->with(['flash_level' => 'result_msg', 'flash_message' => 'Admin đăng nhập thành công']);     
    }

    public function getRegister () {
        return view('login.register');
    }

    public function postRegister(MatchEditRequest $request) {
        $user = new User;
        $user->username = $request->txtUser;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->money = 5000;
        $user->level = 0;
        $user->created_at = new DateTime();
        $user->save();
        Auth::login($user);
        return redirect('user')->with(['flash_level' => 'result_msg', 'flash_message' => 'Đăng ký thành công']);
    }

    public function getLogout() {
        Auth::logout();
    	return redirect()->route('getHome');
    }
}
