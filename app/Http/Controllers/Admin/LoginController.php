<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\AuthenticatesLogout;

class LoginController extends Controller
{
    use AuthenticatesUsers, AuthenticatesLogout{
        AuthenticatesLogout::logout insteadof AuthenticatesUsers;
    }

    protected $redirectTo = '/admin/login';

    public function __construct()
    {
        $this->middleware('guest.admin', ['except'=>'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function guard()
    {
        return auth()->guard('admin');
    }

    public function username()
    {
        return 'account';
    }
}
