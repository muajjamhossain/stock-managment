@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
        <form method="post" action="{{url('dashboard/product/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>Create product
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All products</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                @if(Session::has('success'))
                <div class="alert alert-success alert_success" role="alert">
                  <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert_error" role="alert">
                  <strong>Opps!</strong> {{Session::get('error')}}
                </div>
                @endif
              </div>
              <div class="col-md-2"></div>
            </div>
            <div class="row mb-3 {{ $errors->has('product_name') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Product Name<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="product_name" value="{{old('product_name')}}">
                  @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('category_id') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Product Category<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  @php
                    $allCategory=App\Models\ProductCategory::where('prodcate_status',1)->orderBy('prodcate_name','ASC')->get();
                  @endphp
                  <select class="form-control form_control" id="" name="category_id">
                  <option value="" selected>Please Select</option>
                    @foreach($allCategory as $category)
                    <option value="{{$category->prodcate_id}}">{{$category->prodcate_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('product_remarks') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Remarks<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="product_remarks" value="{{old('product_remarks')}}">
                  @if ($errors->has('product_remarks'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_remarks') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
          </div>
          <div class="card-footer card_footer text-center">
            <button type="submit" class="btn btn-md btn-dark">CREATE</button>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection
