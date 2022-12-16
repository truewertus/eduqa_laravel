<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class photoController extends Controller
{
    public function index($id){
        return view('photo.index', ['id' => $id]);
    }

    public function save(Request $request, $id){
        $validate = $this->validate($request, [
            'file' => 'required|array',
            'file.*' => 'file|mimes:jpg,png,jpeg,xlsx',
        ]);
        foreach($validate['file'] as $file){
            dump($file);
            $path = Storage::putFile('upload/foto', $file);
            dump($path);
            return "<a href='".Storage::url($path)."'>Ссылка</a>";
        }
        dd('123');
        return redirect(route('photo.index',['id' => $id]));
    }
}
