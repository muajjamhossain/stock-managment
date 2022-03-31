<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Session;
use Image;

class ProductController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }


    public function getProduct(){
     return $allProduct = Product::orderBy('product_id','DESC')->get();
    }

    public function index(){
      $allProduct = $this->getProduct();
      return view('admin.product.main.all',compact('allProduct'));
    }

    public function add(){
      return view('admin.product.main.add');
    }

    public function edit($product_slug){
      $product=Product::where('product_status',1)->where('product_slug',$product_slug)->firstOrFail();
      return view('admin.product.main.edit',compact('product'));
    }

    public function view($product_slug){
      $product=Product::with('categoryInfo')->where('product_status',1)->where('product_slug',$product_slug)->firstOrFail();
      return view('admin.product.main.view',compact('product'));
    }

    public function insert(Request $request){
      // dd('ok');
      $this->validate($request,[
        'product_name'=>'required|string|max:255',
        'category_id'=>'required',
      ],[
        'product_name.required'=>'Please enter product name',
        'category_id.required'=>'Please Select Category',
      ]);

      $product = Product::where('product_status',1)->where('prodcate_id',$request->category_id)->where('product_name',$request->product_name)->count();

      if($product != 0){
        
        Session::flash('error','Product creation failed.');
        return redirect('dashboard/product/add');
        
      }else{
        $product_slug=Str::slug($request['product_name'],'-');
        $creator=auth()->user()->id;
        $insert=Product::insertGetId([
          'product_name'=>$request['product_name'],
          'prodcate_id'=>$request['category_id'],
          'product_remarks'=>$request['product_remarks'],
          'product_creator'=>$creator,
          'product_slug'=>$product_slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        Session::flash('success','Successfully created the product.');
        return redirect('dashboard/product');
        
      }

     
      // if($insert){
      //   Session::flash('success','Successfully created the product.');
      //   return redirect('dashboard/product');
      // }else{
      //   Session::flash('error','Product creation failed.');
      //   return redirect('dashboard/product/add');
      // }
    }

    public function update(Request $request){
      $product_id = $request['product_id'];
      $editor=auth()->user()->id;

      $this->validate($request,[
        'product_name'=>'required|string|max:255|unique:products,product_name,'.$product_id.',product_id',
        'category_id'=>'required',
      ],[
        'product_name.required'=>'Please enter product name.',
        'product_name.unique'=>'Product Name Already Exists.',
        'category_id.required'=>'Please Select Category',
      ]);

      $product_slug=Str::slug($request['product_name'],'-');

      $update=Product::where('product_status',1)->where('product_id',$product_id)->update([
        'product_name'=>$request['product_name'],
        'prodcate_id'=>$request['category_id'],
        'product_remarks'=>$request['product_remarks'],
        'product_editor'=>$editor,
        'product_slug'=>$product_slug,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Successfully updated Product information.');
        return redirect('dashboard/product/view/'.$product_slug);
      }else{
        Session::flash('error','Failed updating product information.');
        return redirect('dashboard/product/edit/'.$product_slug);
      }
    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}
