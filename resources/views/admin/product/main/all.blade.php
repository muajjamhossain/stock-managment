@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i data-feather="layers"></i> All Product Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/add')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-plus-circle"></i> Add product</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              <table id="basic-datatable" class="table table-bordered table-striped table-hover custom_table">
                  <thead class="table-dark">
                      <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Created By</th>
                          <th>Edited By</th>
                          <th>Manage</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($allProduct as $product)
                      <tr>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->categoryInfo->prodcate_name}}</td>
                          <td>{{$product->creatorInfo->name}}</td>
                         
                          @if($product->product_editor!='')
                            <td>{{$product->editorInfo->name}}</td>
                          @else
                          <td>...</td>
                          @endif
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage <i class="icon">
                                  <span data-feather="chevron-down"></span>
                                </i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{url('dashboard/product/view/'.$product->product_slug)}}" class="dropdown-item"><span>View</span></a>
                                <a href="{{url('dashboard/product/edit/'.$product->product_slug)}}" class="dropdown-item"><span>Edit</span></a>
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
