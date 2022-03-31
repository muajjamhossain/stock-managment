<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Customer;
use Carbon\Carbon;
use Session;
use Image;



class CustomerController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }
    
    public function index(){
      $allCustomer=Customer::orderBy('customer_id','DESC')->get();
      return view('admin.customer.all',compact('allCustomer'));
    }

    public function add(){
      return view('admin.customer.add');
    }

    public function edit($customer_slug){
      $customer=Customer::where('customer_status',1)->where('customer_slug',$customer_slug)->firstOrFail();
      return view('admin.customer.edit',compact('customer'));
    }

    public function view($customer_slug){
      $customer=Customer::where('customer_status',1)->where('customer_slug',$customer_slug)->firstOrFail();
      return view('admin.customer.view',compact('customer'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'customer_name'=>'required|string|max:255',
        'customer_email'=>'required|string|max:255|unique:customers',
        'customer_phone'=>'required|string|min:10|max:18',
        'customer_address'=>'required|string|min:20||max:255',
      ],[
        'customer_name.required'=>'Please enter customer name.',
        'customer_email.required'=>'Please enter customer email.',
        'customer_phone.required'=>'Please enter customer phone.',
        'customer_address.required'=>'Please enter customer address',
      ]);
      $customer_slug=Str::slug($request['customer_name'],'-');
      $creator=auth()->user()->id;
      $insert=Customer::insertGetId([
        'customer_name'=>$request['customer_name'],
        'customer_email'=>$request['customer_email'],
        'customer_phone'=>$request['customer_phone'],
        'customer_address'=>$request['customer_address'],
        'customer_creator'=>$creator,
        'customer_slug'=>$customer_slug,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);
      if($insert){
        Session::flash('success','Successfully created the customer.');
        return redirect('dashboard/customer');
      }else{
        Session::flash('error','User registration failed.');
        return redirect('dashboard/customer/add');
      }
    }

    public function update(Request $request){
      $customer_id = $request['customer_id'];
      $editor=auth()->user()->id;

      $this->validate($request,[
        'customer_name'=>'required|string|max:255',
        'customer_phone'=>'required|string|min:10|max:18',
        'customer_address'=>'required|string|min:20||max:255',
      ],[
        'customer_name.required'=>'Please enter customer name.',
        'customer_phone.required'=>'Please enter customer phone.',
        'customer_address.required'=>'Please enter customer address',
      ]);

      $customer_slug=Str::slug($request['customer_name'],'-');

      $update=Customer::where('customer_status',1)->where('customer_id',$customer_id)->update([
        'customer_name'=>$request['customer_name'],
        'customer_phone'=>$request['customer_phone'],
        'customer_address'=>$request['customer_address'],
        'customer_editor'=>$editor,
        'customer_slug'=>$customer_slug,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Successfully updated customer information.');
        return redirect('dashboard/customer/view/'.$customer_slug);
      }else{
        Session::flash('error','Failed updating customer information.');
        return redirect('dashboard/customer/edit/'.$customer_slug);
      }
    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}
