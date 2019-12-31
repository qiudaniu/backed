<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() === "GET") return view('admin.login');
        else
        {
            dd($request->input('account'));
            $user = Auth::guard()->attempt(['account' => $request->input('account'), 'password' => md5($request->input('password'))]);
            dd($user);
        }
    }
}
