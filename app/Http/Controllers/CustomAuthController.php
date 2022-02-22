<?php

namespace App\Http\Controllers;

use App\Models\Aktuality;
use App\Models\Prihlasky;
use App\Models\Prihlaskyvic;
use App\Models\Uzivatel;
use App\Models\Zavody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomController;

class CustomAuthController extends Controller
{

    public function index()
    {
        if($this->isLogout() === true)
            return view('auth.login');
        else
            return $this->isLogout();
    }


    public function customLogin(Request $request)
    {

        $request->validate([
            'uz_login' => 'required',
            'uz_heslo' => 'required',
        ]);

        $credentials = $request->only('uz_login', 'uz_heslo');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }


//    public function registration()
//    {
//        return view('auth.registration');
//    }
//
//
//    public function customRegistration(Request $request)
//    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:6',
//        ]);
//
//        $data = $request->all();
//        $check = $this->create($data);
//
//        return redirect("dashboard")->withSuccess('You have signed-in');
//    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }


    public function isLogin()
    {
        if(Auth::check()){
            return true;
        }
        else {
            return redirect()->action([CustomAuthController::class, 'index'])->withErrors('You are not allowed to access');
        }
    }


    public function isLogout()
    {
        if(Auth::check()){
            return redirect()->action([CustomController::class, 'home'])->withErrors('You are already login');
        }
        else {
            return true;
        }
    }
}
