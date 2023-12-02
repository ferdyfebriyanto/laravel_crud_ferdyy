<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            if(Auth::user()->isAdmin == 0) {
                return view('pages.dashboard');
            } else {
                return view('pages.dashboard');
            }
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
        $user->isAdmin = 1;
        $user->save();

        return redirect(route('login'))->with('success', 'Register Success');
    }

    public function dashboard()
    {
        $product = Product::all();
        return view('pages.dashboard', compact('product'));
    }

    public function profile()
    {
        $data = auth()->user();
        return view('pages.profile', compact('data'));
    }

    public function updateProfile(User $user, Request $request)
    {
        $dataUser = User::find($user->id);
        if ($request->password) {
            $dataUser->name = $request->name;
            $dataUser->email = $request->email;
            $dataUser->password = Hash::make($request->password);
            $dataUser->update();

            Auth::logout();
            return redirect(route('login'))->with('success', 'Password Changed Successfully');
        } else {
            $dataUser->name = $request->name;
            $dataUser->email = $request->email;
            $dataUser->update();

            return redirect(route('profile'));
        }
    }

    public function deleteAccount(User $user)
    {
        $user->delete();
        Auth::logout();
        return redirect(route('login'))->with('success', 'Account Successfully Deleted');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
