<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ProductPurchase;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Session;
use Image;

class ProductPurchaseController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $allPurchase=ProductPurchase::orderBy('purchase_id','DESC')->get();
      return view('admin.product.purchase.all',compact('allPurchase'));
    }

    public function add(){
      return view('admin.product.purchase.add');

    }

    public function edit($purchase_slug){
      return view('admin.product.purchase.edit');

    }

    public function view($purchase_slug){
      $purchase=ProductPurchase::where('purchase_status',1)->where('purchase_slug',$purchase_slug)->firstOrFail();
      return view('admin.product.purchase.view',compact('purchase'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'product_name'=>'required',
        'supplier_name'=>'required',
        'purchase_price'=>'required|numeric',
        'quantity'=>'required|numeric',
        'purchase_total_price'=>'required|numeric',
      ],[
        'product_name.required'=>'Please select product name.',
        'supplier_name.required'=>'Please select Supplier',
        'purchase_price.required'=>'Please insert per unit price',
        'purchase_price.numeric'=>'Only numbers are allowed',
        'quantity.required'=>'Please insert quntity of purchase',
        'quantity.numeric'=>'Only numbers are allowed',
        'purchase_total_price.required'=>'Please insert total price',
        'purchase_total_price.numeric'=>'Only numbers are allowed',
      ]);
      $purchase_slug=Str::random(10);
      $creator=Auth()->user()->id;
      $insert=ProductPurchase::insertGetId([
        'product_id'=>$request['product_name'],
        'supplier_id'=>$request['supplier_name'],
        'purchase_price'=>$request['purchase_price'],
        'purchase_quantity'=>$request['quantity'],
        'purchase_total_price'=>$request['purchase_total_price'],
        'purchase_remarks'=>$request['purchase_remarks'],
        'purchase_creator'=>$creator,
        'purchase_slug'=>$purchase_slug,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
        Session::flash('success','Successfully created the purchase.');
        return redirect('dashboard/product/purchase');
      }else{
        Session::flash('error','Pusrchase creation failed.');
        return redirect('dashboard/product/purchase/add');
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
