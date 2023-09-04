<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{

    public CartController $cartController;

    public function __construct(CartController $cartController)
    {
        $this->cartController = $cartController;
    }
    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'msg' => 'Wrong email or password, try again!'
            ]);
        }

        $cartCount = $request->session()->get('cartCount', 0);
        $request->session()->put('cartCount', $cartCount);
        $request->session()->flash('flash_notification.success', 'Welcome back!');
        return redirect()->to('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->cartController->clear();
        $request->session()->forget('cartCount');
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
