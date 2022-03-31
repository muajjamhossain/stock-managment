<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Exports\ProductCategoryExport;
use Carbon\Carbon;
use Session;
use Excel;
use PDF;

class ProductCategoryController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=ProductCategory::where('prodcate_status',1)->orderBy('prodcate_id','DESC')->get();
      return view('admin.product.category.all',compact('all'));
    }

    public function add(){
      return view('admin.product.category.add');
    }

    public function edit($slug){
      $data=ProductCategory::where('prodcate_status',1)->where('prodcate_slug',$slug)->firstOrFail();
      return view('admin.product.category.edit',compact('data'));
    }

    public function view($slug){
      $data=ProductCategory::where('prodcate_status',1)->where('prodcate_slug',$slug)->firstOrFail();
      return view('admin.product.category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|unique:product_categories,prodcate_name',
      ],[
        'name.required'=>'Please enter product category name!',
        'name.unique'=>'Product category name has already been taken!',
      ]);

      $slug=Str::slug($request['name'],'-');
      $insert=ProductCategory::insert([
        'prodcate_name'=>$request['name'],
        'prodcate_remarks'=>$request['remarks'],
        'prodcate_slug'=>$slug,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
        Session::flash('success','Successfully save product category information.');
        return redirect('dashboard/product/category/add');
      }else{
        Session::flash('error','Failed your action.');
        return redirect('dashboard/product/category/add');
      }
    }

    public function update(Request $request){
      $id=$request['id'];

      $this->validate($request,[
        'name'=>'required|unique:product_categories,prodcate_name,'.$id.',prodcate_id'
      ],[
        'name.required'=>'Please enter product category name!',
        'name.unique'=>'Product category name has already been taken!',
      ]);

      $slug=Str::slug($request['name'],'-');

      $update=ProductCategory::where('prodcate_status',1)->where('prodcate_id',$id)->update([
        'prodcate_name'=>$request['name'],
        'prodcate_remarks'=>$request['remarks'],
        'prodcate_slug'=>$slug,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Successfully update product category information.');
        return redirect('dashboard/product/category/view/'.$slug);
      }else{
        Session::flash('error','Failed your action.');
        return redirect('dashboard/product/category/edit/'.$slug);
      }
    }

    public function softdelete(){
      $id=$_POST['modal_id'];
      $soft=ProductCategory::where('prodcate_status',1)->where('prodcate_id',$id)->update([
        'prodcate_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','Successfully delete category information.');
        return redirect('dashboard/product/category');
      }else{
        Session::flash('error','Failed your action.');
        return redirect('dashboard/product/category');
      }
    }

    public function restore(){
      $id=$_POST['modal_id'];
      $restore=ProductCategory::where('prodcate_status',0)->where('prodcate_id',$id)->update([
        'prodcate_status'=>1,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($restore){
        Session::flash('success','Successfully restore category information.');
        return redirect('dashboard/recycle/product/category');
      }else{
        Session::flash('error','Failed your action.');
        return redirect('dashboard/recycle/product/category');
      }
    }

    public function delete(){
      $id=$_POST['modal_id'];
      $del=ProductCategory::where('prodcate_status',0)->where('prodcate_id',$id)->delete();

      if($del){
        Session::flash('success','Successfully permanently delete category information.');
        return redirect('dashboard/recycle/product/category');
      }else{
        Session::flash('error','Failed your action.');
        return redirect('dashboard/recycle/product/category');
      }
    }

    public function excel(){
      return Excel::download(new ProductCategoryExport, 'product-category.xlsx');
    }

    public function pdf(){
      $all=ProductCategory::where('prodcate_status',1)->orderBy('prodcate_id','DESC')->get();
      $pdf = PDF::loadView('admin.product.category.pdf', compact('all'));
      return $pdf->download('product-category.pdf');
    }
}
