@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-6 col-xl-3">
    <a href="#">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <span class="text-muted text-uppercase fs-12 fw-bold">Recycle User</span>
              <h3 class="mb-0">0</h3>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6 col-xl-3">
    <a href="#">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <span class="text-muted text-uppercase fs-12 fw-bold">Recycle Product</span>
              <h3 class="mb-0">0</h3>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6 col-xl-3">
    @php
      $totalCate=App\Models\ProductCategory::where('prodcate_status',0)->count();
    @endphp
    <a href="{{url('dashboard/recycle/product/category')}}">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <span class="text-muted text-uppercase fs-12 fw-bold">Recycle Product Category</span>
              <h3 class="mb-0">
                @if($totalCate < 10)
                  0{{$totalCate}}
                @else
                  {{$totalCate}}
                @endif
              </h3>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6 col-xl-3">
    <a href="#">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <span class="text-muted text-uppercase fs-12 fw-bold">Recycle Product Order</span>
              <h3 class="mb-0">0</h3>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
