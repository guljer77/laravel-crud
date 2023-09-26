@extends('admin.layouts.master')
@section('title','Welcome')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Details Product</h4>
            <a href="{{ route('dashboard') }}" class="btn btn-info">All Product</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td>Product Name</td>
                    <td>{{ $product->product_title }}</td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <td>Available Quantity</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{!! $product->description !!}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="{{ asset($product->image) }}" alt="" width="450px" height="280"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

