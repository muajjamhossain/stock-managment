@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
        <form method="post" action="{{url('dashboard/product/category/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>Update Product Category Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/category')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All Caregory</a>
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
            <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Category Name<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="hidden" name="id" value="{{$data->prodcate_id}}">
                  <input type="hidden" name="slug" value="{{$data->prodcate_slug}}">
                  <input type="text" class="form-control form_control" id="" name="name" value="{{$data->prodcate_name}}">
                  @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-lg-3 col-form-label col_form_label">Remarks:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="remarks" value="{{$data->prodcate_remarks}}">
              </div>
            </div>
          </div>
          <div class="card-footer card_footer text-center">
            <button type="submit" class="btn btn-md btn-dark">UPDATE</button>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection
