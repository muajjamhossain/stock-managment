@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>View All Product Purcahse Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/purchase')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-list"></i> All Purchases</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>product Name</td>
                        <td>:</td>
                        <td>{{$purchase->productInfo->product_name}}</td>
                      </tr>

                      <tr>
                        <td>Supplier Name</td>
                        <td>:</td>
                        <td>{{$purchase->supplierInfo->supplier_name}}</td>
                      </tr>
                      <tr>
                        <td>Unit Price</td>
                        <td>:</td>
                        <td>{{$purchase->purchase_price}}</td>
                      </tr>
                      <tr>
                        <td>Purchase Quantity</td>
                        <td>:</td>
                        <td>{{$purchase->purchase_quantity}}</td>
                      </tr>
                      <tr>
                        <td>Total Price</td>
                        <td>:</td>
                        <td>{{$purchase->purchase_total_price}}</td>
                      </tr>
                      <tr>
                        <td>Remarks</td>
                        <td>:</td>
                        <td>{{$purchase->purchase_remarks}}</td>
                      </tr>
                      <tr>
                        <td>Created BY</td>
                        <td>:</td>
                        <td>{{$purchase->creatorInfo->name}}</td>
                      </tr>
                      <tr>
                        <td>Created BY</td>
                        <td>:</td>
                        <td>{{$purchase->purchase_editor}}</td>
                      </tr>
                      <tr>
                        <td>Purchase Time</td>
                        <td>:</td>
                        <td>{{$purchase->created_at->format('d-m-Y | h:i:s A')}}</td>
                      </tr>
                      <tr>
                        <td>Edit Time</td>
                        <td>:</td>
                        <td>{{$purchase->edited_at->format('d-m-Y | h:i:s A')}}</td>
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
