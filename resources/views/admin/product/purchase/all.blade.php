@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i data-feather="layers"></i> All Product Purchase Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/purchase/add')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-plus-circle"></i> Create purchase</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              <table id="basic-datatable" class="table table-bordered table-striped table-hover custom_table">
                  <thead class="table-dark">
                      <tr>
                          <th>Product Name</th>
                          <th>Supplier</th>
                          <th>Unit Price</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Remarks</th>
                          <th>Created By</th>
                          <th>Edited By</th>
                          <th>Manage</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($allPurchase as $purchase)
                      <tr>
                          <td>{{$purchase->productInfo->product_name}}</td>
                          <td>{{$purchase->supplierInfo->supplier_name}}</td>
                          <td>{{$purchase->purchase_price}}</td>
                          <td>{{$purchase->purchase_quantity}}</td>
                          <td>{{$purchase->purchase_total_price}}</td>
                          <td>{{$purchase->purchase_remarks}}</td>
                          <td>{{$purchase->creatorInfo->name}}</td>
                          <td>{{$purchase->purchase_editor}}</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage <i class="icon">
                                  <span data-feather="chevron-down"></span>
                                </i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{url('dashboard/product/purchase/view/'.$purchase->purchase_slug)}}" class="dropdown-item"><span>View</span></a>
                                <a href="{{url('dashboard/product/purchase/edit/'.$purchase->purchase_slug)}}" class="dropdown-item"><span>Edit</span></a>
                                <a href="#" class="dropdown-item"><span>Delete</span></a>
                              </div>
                            </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
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
