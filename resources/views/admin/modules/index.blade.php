@extends('admin.layouts.master')
@section('title','Welcome')
@section('content')
    <div class="card">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>All Product</h4>
            <a href="{{ route('add-product') }}" class="btn btn-info">Add Product</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ substr($product->product_title, 0,15) }}...</td>
                    <td>{{ $product->price }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="" width="80" height="60"></td>
                    <td>{{ $product->status == 1 ? "published":"unpublished" }}</td>
                    <td>
                        <a class="btn btn-sm {{ $product->status == 1 ? "btn-info":"btn-warning" }}" href="{{ route('change-status',$product->id) }}"><i class="bx {{ $product->status == 1 ? "bx-up-arrow-alt":"bx-down-arrow-alt"  }} me-1"></i></a>
                        <a class="btn btn-sm btn-info" href="{{ route('details-product',$product->id) }}"><i class="bx bx-book-open me-1"></i></a>
                        <a class="btn btn-sm btn-info" href="{{ route('edit-product',$product->id) }}"><i class="bx bx-edit-alt me-1"></i></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('delete-product',$product->id) }}"><i class="bx bx-trash me-1"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
