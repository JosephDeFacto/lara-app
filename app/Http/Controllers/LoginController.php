<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'msg' => 'Wrong email or password, try again!'
            ]);
        }

        $user = Auth::user();

        $request->session()->flash('flash_notification.success', 'Welcome back!');
        return redirect()->to('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
