<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\schoolsModel;
use App\Models\cultureModel;

class schoolsController extends Controller
{
    private $userType = null;

    public function index(){
        $userType = Auth::user()->type==1?1:0;
        if($userType == 0){
            $schoolList = schoolsModel::where(['deleted' => 0,'ate' => Auth::user()->ate])->orderBy('id')->get();
        }elseif($userType == 1){
            $schoolList = cultureModel::where(['deleted' => 0,'num' => Auth::user()->ate])->orderBy('id')->get();
        }
        return view('schools.index', ['schoolList' => $schoolList]);
    }

    public function show($id){
        $userType = Auth::user()->type==1?1:0;
        if($userType == 0){
            $school = schoolsModel::where(['deleted' => 0,'ate' => Auth::user()->ate, 'id' => $id])->first();
        }elseif($userType == 1){
            $school = cultureModel::where(['deleted' => 0,'num' => Auth::user()->ate,'id' => $id])->first();
        }
        if(empty($school)){
            return redirect(route('index'));
        }
        return view('schools.modschool',['school' => $school]);
    }

    public function change($id, Request $request){
        $validate = $this->validate($request,[
            'name' => 'string|required',
            'address' => 'string|nullable',
            'site' => 'string|nullable',
            'con' => 'int|nullable',
            'vib' => 'int|nullable',
        ]);
        $userType = Auth::user()->type==1?1:0;
        if($userType == 0){
            $school = schoolsModel::where(['deleted' => 0,'ate' => Auth::user()->ate, 'id' => $id])->first();
        }elseif($userType == 1){
            $school = cultureModel::where(['deleted' => 0,'num' => Auth::user()->ate,'id' => $id])->first();
        }
        if(empty($school)){
            return redirect(route('index'));
        }
        $school->name = $validate['name'];
        $school->address = $validate['address'];
        $school->site = $validate['site'];
        $school->con = $validate['con'];
        $school->vib = $validate['vib'];
        $school->save();
        return redirect(route('schools.show',$id))->with(['saved' => 'Все сохранено!']);
    }

    public function delete($id){
        $userType = Auth::user()->type==1?1:0;
        if($userType == 0){
            $school = schoolsModel::where(['deleted' => 0,'ate' => Auth::user()->ate, 'id' => $id])->first();
        }elseif($userType == 1){
            $school = cultureModel::where(['deleted' => 0,'num' => Auth::user()->ate,'id' => $id])->first();
        }
        if($school){
            $school->deleted = 1;
            $school->save();
            return redirect(route('schools.index'))->with(['message'=>"Школа {$school->name} удалена!"]);
        }
        return redirect(route('schools.index'));
    }   

    public function foto($id){
        return view('welcome');
    }
}
