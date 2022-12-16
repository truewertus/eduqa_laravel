<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filesModel;
use Illuminate\Support\Facades\Storage;

class filesController extends Controller
{
    public function index($type){
        $type = $type=="edu"?1:2;
        return view('files',[
            'files' => filesModel::where([['deleted',0],['type',$type]])->get(),
        ]);
    }
}
