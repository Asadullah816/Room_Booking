<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function register(Request $req)
    {
        $user = new User;
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmed' => 'required',
        ]);
        $user->name = $req->name;
        $user->email = $req->name;
        $user->password = Hash::make($req->password);
        $user->save();
        $credentials = $req->only($user->email, $user->password);
        Auth::attempt($credentials);
        $req->session()->regenerate();
        return redirect('/');
    }
    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect('/');
        }
        return back()->with('error', 'The Credentials does not match our records');
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('login');
    }
}
