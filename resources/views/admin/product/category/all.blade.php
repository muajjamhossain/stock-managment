@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header card_header">
            <div class="row">
              <div class="col-md-8 card_header_title text-uppercase">
                <i class="uil uil-layer-group"></i>All Product Category Information
              </div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/product/category/add')}}" class="btn btn-sm btn-dark card_btn"><i class="bi-plus-circle"></i> Add Category</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              <table id="basic-datatable" class="table table-bordered table-striped table-hover custom_table">
                  <thead class="table-dark">
                      <tr>
                          <th>Category Name</th>
                          <th>Remarks</th>
                          <th>Products</th>
                          <th>Manage</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($all as $data)
                      <tr>
                          <td>{{$data->prodcate_name}}</td>
                          <td>{{$data->prodcate_remarks}}</td>
                          <td>----</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage <i class="icon">
                                  <span data-feather="chevron-down"></span>
                                </i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{url('dashboard/product/category/view/'.$data->prodcate_slug)}}" class="dropdown-item"><span>View</span></a>
                                <a href="{{url('dashboard/product/category/edit/'.$data->prodcate_slug)}}" class="dropdown-item"><span>Edit</span></a>
                                <a href="#" class="dropdown-item" id="softDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$data->prodcate_id}}"><span>Delete</span></a>
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
              <a href="{{url('dashboard/product/category/pdf')}}" class="btn btn-dark">PDF</a>
              <a href="{{url('dashboard/product/category/excel')}}" class="btn btn-secondary">Excel</a>
            </div>
          </div>
      </div>
  </div>
</div>
<!-- delete modal code start -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form method="post" action="{{url('dashboard/product/category/softdelete')}}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Confirm Message</h5>
            </div>
            <div class="modal-body modal_body">
              Are you want sure delete data?
              <input type="hidden" id="modal_id" name="modal_id" />
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </form>
  </div>
</div>
@endsection
