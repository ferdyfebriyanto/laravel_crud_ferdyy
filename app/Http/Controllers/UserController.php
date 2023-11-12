<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function prosesLogin(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            session(['user' => Auth::user()]);
            return redirect(route('dashboard'));
        } else {
            return redirect(route('login'))->with('failed', 'Email or Password Wrong');
        }
    }

    public function prosesRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->with('success', 'Register Success');
    }

    public function dashboard()
    {
        return view('Pages.dashboard');
    }

    public function profile()
    {
        return view('Pages.profile');
    }

    public function updateProfile(Request $request)
    {
        if ($request->passowrd) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        return redirect(route('Pages.profile'));
    }

    public function deleteAccount(User $user)
    {
        $user->delete();
        Auth::logout();
        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
