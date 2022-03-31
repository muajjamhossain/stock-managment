<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;

class UserController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $allUser=User::orderBy('id','DESC')->get();
      return view('admin.user.all',compact('allUser'));
    }

    public function add(){
      return view('admin.user.add');
    }

    public function edit(){

    }

    public function view($id){
      $data=User::where('id',$id)->firstOrFail();
      return view('admin.user.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|string|max:255',
        'email'=>'required|string|max:255|unique:users',
        'password'=>'required|string|min:8|max:255|confirmed',
        'role'=>'required',
      ],[
        'name.required'=>'Please enter name.',
        'email.required'=>'Please enter email address.',
        'password.required'=>'Please enter password.',
        'role.required'=>'Please select user role.',
      ]);
      $insert=User::insertGetId([
        'name'=>$request['name'],
        'email'=>$request['email'],
        'password'=>Hash::make($request['password']),
        'role'=>$request['role'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.'_'.time().'_'.rand(100000,10000000).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);

        User::where('id',$insert)->update([
          'photo'=>$imageName,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      }

      if($insert){
        Session::flash('success','Successfully complete user registration.');
        return redirect('dashboard/user/add');
      }else{
        Session::flash('error','User registration failed.');
        return redirect('dashboard/user/add');
      }
    }

    public function update(){

    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}
