<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authorization(Request $request) : RedirectResponse 
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $requestData = $request->all();

        if (isset($requestData['remember'])) {
            if (Auth::attempt(['email' => $requestData['email'], 'password' => $requestData['password']], $requestData['remember'])) {
                $request->session()->regenerate();
     
                return redirect()->route('admin.dashboard');  
            }
        } else {
            if (Auth::attempt(['email' => $requestData['email'], 'password' => $requestData['password']])) {
                $request->session()->regenerate();
     
                return redirect()->route('admin.dashboard');  
            }
        }
        
        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email'); 
    }
}
