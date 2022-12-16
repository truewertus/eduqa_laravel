<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function login(Request $request){
        $validateRequest = $this->validate($request, [
            'login' => 'required',
            'password' => 'required',
        ]);
     
        if(Auth::attempt(['id' => $validateRequest['login'], 'pass' => md5($validateRequest['password'])])){
            return redirect(route('index'));
        }
        //return redirect(route('index'))->withErrors(['loginErrors' => 'Не правильно!']);
 
        return view('main')->with(['loginErrors' => 'Не правильно']);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect(route('index'));
    }
}
