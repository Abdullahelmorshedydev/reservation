<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\Admin\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login ()
    {
        return view('admin.pages.auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        return back()->with('error', __('web/admin/login.credintial_not_found'));
    }
}
