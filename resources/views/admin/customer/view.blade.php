@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>View Customer Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/customer')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All Customers</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>customer Name</td>
                        <td>:</td>
                        <td>{{$customer->customer_name}}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$customer->customer_email}}</td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{$customer->customer_phone}}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>{{$customer->customer_address}}</td>
                      </tr>
                      <tr>
                        <td>Created BY</td>
                        <td>:</td>
                        <td>{{$customer->creatorInfo->name}}</td>
                      </tr>
                      <tr>
                        <td>Edited By</td>
                        <td>:</td>
                        <td>{{$customer->customer_editor}}</td>
                      </tr>
                      <tr>
                        <td>Creation Time</td>
                        <td>:</td>
                        <td>{{$customer->created_at->format('d-m-Y | h:i:s A')}}</td>
                      </tr>
                  </table>
                </div>
                <div class="col-md-2"></div>
              </div>
          </div>
          <div class="card-footer card_footer">
            <div class="btn-group">
              <a href="#" class="btn btn-secondary">Print</a>
              <a href="#" class="btn btn-dark">PDF</a>
              <a href="#" class="btn btn-secondary">Excel</a>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
