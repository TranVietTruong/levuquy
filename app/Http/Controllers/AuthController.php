<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'min:10', 'max:11'],
            'password' => ['required', 'min:5', 'max:50'],
        ], [
            'phone.required' => 'Nhập số điện thoại',
            'phone.min' => 'Số điện thoại hoặc mật khẩu không đúng',
            'phone.max' => 'Số điện thoại hoặc mật khẩu không đúng',
            'password.required' => 'Nhập mật khẩu',
            'password.min' => 'Số điện thoại hoặc mật khẩu không đúng',
            'password.max' => 'Số điện thoại hoặc mật khẩu không đúng',
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }

        $phone = $request->get('phone');
        $password = $request->get('password');


        $user = User::where('phone', $phone)->where('password', $password)->first();
        if (!$user) {
            return $this->responseBadRequest('Tên đăng nhập hoặc mật khẩu không đúng');
        }
        Auth::loginUsingId($user->id);
        return $this->responseSuccess();
    }

    public function logout() {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login');
        }
        return redirect('/');
    }
}
