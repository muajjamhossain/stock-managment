@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
        <form method="post" action="{{url('dashboard/product/purchase/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>Create Purchase
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/purchase')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All purchases</a>
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
                @php
                  $allProduct=App\Models\Product::where('product_status',1)->orderBy('product_name','ASC')->get();
                @endphp
                  <select class="form-control form_control" id="" name="product_name">
                    <option value="" selected>Please Select</option>
                    @foreach($allProduct as $product)
                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('supplier_name') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Supplier Name<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                @php
                  $allSupplier=App\Models\Supplier::where('supplier_status',1)->orderBy('supplier_name','ASC')->get();
                @endphp
                  <select class="form-control form_control" id="" name="supplier_name">
                    <option value="" selected>Please Select</option>
                    @foreach($allSupplier as $supplier)
                    <option value="{{$supplier->suppler_id}}">{{$supplier->supplier_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('purchase_price') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Unit Price<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="purchase_price" value="{{old('purchase_price')}}">
                  @if ($errors->has('purchase_price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('purchase_price') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('quantity') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Quantity<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="quantity" value="{{old('quantity')}}">
                  @if ($errors->has('quantity'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('purchase_total_price') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Total Price<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="purchase_total_price" value="{{old('purchase_total_price')}}">
                  @if ($errors->has('purchase_total_price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('purchase_total_price') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('purchase_remarks') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Remarks<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="purchase_remarks" value="{{old('purchase_remarks')}}">
                  @if ($errors->has('purchase_remarks'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('purchase_remarks') }}</strong>
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
