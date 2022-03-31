@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
        <form method="post" action="{{url('dashboard/supplier/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>Create supplier
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/supplier')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All suppliers</a>
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
            <div class="row mb-3 {{ $errors->has('supplier_name') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="supplier_name" value="{{old('supplier_name')}}">
                  @if ($errors->has('supplier_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('supplier_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('supplier_email') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="supplier_email" value="{{old('supplier_email')}}">
                  @if ($errors->has('supplier_email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('supplier_email') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('supplier_phone') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Phone<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="supplier_phone" value="{{old('supplier_phone')}}">
                  @if ($errors->has('supplier_phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('supplier_phone') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('supplier_address') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Address<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="supplier_address" value="{{old('supplier_address')}}">
                  @if ($errors->has('supplier_address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('supplier_address') }}</strong>
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
