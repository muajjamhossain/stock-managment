@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
        <form method="post" action="{{url('dashboard/user')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>User Registration
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All User</a>
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
              <label class="col-lg-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                  @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-lg-3 col-form-label col_form_label">Phone:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="phone" value="{{old('phone')}}">
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="text" class="form-control form_control" id="" name="email" value="{{old('email')}}">
                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="password" class="form-control form_control" id="" name="password" value="">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-lg-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  <input type="password" class="form-control form_control" id="" name="password_confirmation" value="">
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('role') ? ' has-error' : '' }}">
              <label class="col-lg-3 col-form-label col_form_label">Role<span class="req_star">*</span>:</label>
              <div class="col-lg-7">
                  @php
                    $allRole=App\Models\Role::where('role_status',1)->orderBy('role_id','ASC')->get();
                  @endphp
                  <select class="form-control form_control" name="role">
                    <option value="">Select User Role</option>
                    @foreach($allRole as $urole)
                    <option value="{{$urole->role_id}}">{{$urole->role_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-lg-3 col-form-label col_form_label">Photo:</label>
              <div class="col-lg-7">
                  <input type="file" accept="image/*"  id="" name="pic">
              </div>
            </div>
          </div>
          <div class="card-footer card_footer text-center">
            <button type="submit" class="btn btn-md btn-dark">REGISTRATION</button>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection
