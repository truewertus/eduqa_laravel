<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ateModel;

class cabinetController extends Controller
{
    //
    public function index(){
        $ateName = ateModel::where(['id' => auth()->user()->ate])->first()->name;
        return view('cabinet',['ateName' => $ateName, 'user' => auth()->user()]);
    }

    public function post(Request $request){
        $validate = $this->validate($request,[
            'fio' => 'required|string',
            'work' => 'required|string',
            'mail' => 'required|email',
            'phone' => 'nullable|string',
            'mob' => 'nullable|string',
        ]);
        //dump($request);
        auth()->user()->fio = $validate['fio'];
        auth()->user()->work = $validate['work'];
        auth()->user()->email = $validate['mail'];
        auth()->user()->phone = $validate['phone'];
        auth()->user()->mob_phone = $validate['mob'];
        auth()->user()->save();
        return redirect(route('cabinet.index'))->with('status', 'Данные обновлены!');        
    }
}
