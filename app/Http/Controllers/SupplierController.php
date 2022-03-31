<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Supplier;
use Carbon\Carbon;
use Session;
use Image;

class SupplierController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $allSupplier=Supplier::orderBy('supplier_id','DESC')->get();
      return view('admin.supplier.all',compact('allSupplier'));
    }

    public function add(){
      return view('admin.supplier.add');
    }

    public function edit($supplier_slug){
      $supplier=supplier::where('supplier_status',1)->where('supplier_slug',$supplier_slug)->firstOrFail();
      return view('admin.supplier.edit',compact('supplier'));
    }

    public function view($supplier_slug){
      $supplier=supplier::where('supplier_status',1)->where('supplier_slug',$supplier_slug)->firstOrFail();
      return view('admin.supplier.view',compact('supplier'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'supplier_name'=>'required|string|max:255',
        'supplier_email'=>'required|string|max:255|unique:suppliers',
        'supplier_phone'=>'required|string|min:10|max:18',
        'supplier_address'=>'required|string|min:20||max:255',
      ],[
        'supplier_name.required'=>'Please enter supplier name.',
        'supplier_email.required'=>'Please enter supplier email.',
        'supplier_phone.required'=>'Please enter supplier phone.',
        'supplier_address.required'=>'Please enter supplier address',
      ]);
      $supplier_slug=Str::slug($request['supplier_name'],'-');
      $creator=auth()->user()->id;
      $insert=Supplier::insertGetId([
        'supplier_name'=>$request['supplier_name'],
        'supplier_email'=>$request['supplier_email'],
        'supplier_phone'=>$request['supplier_phone'],
        'supplier_address'=>$request['supplier_address'],
        'supplier_creator'=>$creator,
        'supplier_slug'=>$supplier_slug,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);
      if($insert){
        Session::flash('success','Successfully created the supplier.');
        return redirect('dashboard/supplier');
      }else{
        Session::flash('error','User registration failed.');
        return redirect('dashboard/supplier/add');
      }
    }

    public function update(Request $request){
      $supplier_id = $request['supplier_id'];
      $editor=auth()->user()->id;

      $this->validate($request,[
        'supplier_name'=>'required|string|max:255',
        'supplier_phone'=>'required|string|min:10|max:18',
        'supplier_address'=>'required|string|min:20||max:255',
      ],[
        'supplier_name.required'=>'Please enter supplier name.',
        'supplier_phone.required'=>'Please enter supplier phone.',
        'supplier_address.required'=>'Please enter supplier address',
      ]);

      $supplier_slug=Str::slug($request['supplier_name'],'-');

      $update=Supplier::where('supplier_status',1)->where('supplier_id',$supplier_id)->update([
        'supplier_name'=>$request['supplier_name'],
        'supplier_phone'=>$request['supplier_phone'],
        'supplier_address'=>$request['supplier_address'],
        'supplier_editor'=>$editor,
        'supplier_slug'=>$supplier_slug,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Successfully updated supplier information.');
        return redirect('dashboard/supplier/view/'.$supplier_slug);
      }else{
        Session::flash('error','Failed updating supplier information.');
        return redirect('dashboard/supplier/edit/'.$supplier_slug);
      }
    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}