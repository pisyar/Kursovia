<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('index');
    }

    public function login(UserLoginRequest $request){
        $user = User::where("name", $request->name)->first();
        if($user && Hash::check($request->password, $request->password)){
        Auth::login($user);
        return redirect()->route('index');
        }
        return back()->withInput()->withErrors(['password'=> 'Неверный логин или пароль']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function index()
    {
        return view("index");
    }

    
}
