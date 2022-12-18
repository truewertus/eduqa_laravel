<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class anketaController extends Controller
{
    public function index(){
        if(isset($_GET['id'])){
            return redirect(route('anketa.show',['id' => $_GET['id']]));
        }
        return view('anketa.index');
    }

    public function show($id){
        if(!is_numeric($id)){
            return abort(404);
        }
        return view('anketa.anketa');
    }

    public function save($id){

    }
}
