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
        if(is_numeric($id)){
            if($userType == 0){
                $school = schoolsModel::where(['deleted' => 0,'ate' => Auth::user()->ate, 'id' => $id])->first();
            }elseif($userType == 1){
                $school = cultureModel::where(['deleted' => 0,'num' => Auth::user()->ate,'id' => $id])->first();
            }
            if(empty($school)){
                return redirect(route('index'));
            }
            return view('schools.modschool',['school' => $school]);
        }elseif($id == 'new'){
            $school = $userType==0?new schoolsModel():new cultureModel();
            return view('schools.modschool',['school' => $school]);
        }
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
        if(is_numeric($id)){
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
            return redirect(route('schools.show',$id))->with(['saved' => '?????? ??????????????????!']);
        }elseif($id == "new"){
            if($userType == 0){
                $school = schoolsModel::create(['deleted' => 0,'ate' => Auth::user()->ate, 'name' => $validate['name'], 'address' => $validate['address'], 'site' => $validate['site'], 'con' => $validate['con'],'vib' => $validate['vib']] );
            }elseif($userType == 1){
                $school = cultureModel::create(['deleted' => 0,'num' => Auth::user()->ate, 'name' => $validate['name'], 'address' => $validate['address'], 'site' => $validate['site'], 'con' => $validate['con'],'vib' => $validate['vib']] );
            }
            return redirect(route('schools.show',$school->id))->with(['saved' => '?????? ??????????????????!']);
        }
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
            return redirect(route('schools.index'))->with(['message'=>"?????????? {$school->name} ??????????????!"]);
        }
        return redirect(route('schools.index'));
    }   
    
}
