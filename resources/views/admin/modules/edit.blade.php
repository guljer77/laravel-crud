@extends('admin.layouts.master')
@section('title','Welcome')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Update Product</h4>
            <a href="{{ route('dashboard') }}" class="btn btn-info">All Product</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('update-product',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Product Title</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="product_title"
                            class="form-control"
                            id="basic-default-company"
                            value="{{ $product->product_title }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company2">Product Price</label>
                    <div class="col-sm-10">
                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            id="basic-default-company2"
                            value="{{ $product->price }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company3">Product Quantity</label>
                    <div class="col-sm-10">
                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            id="basic-default-company3"
                            value="{{ $product->quantity }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company4">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="editor" cols="30" rows="10">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company6">Product Image</label>
                    <div class="col-sm-10">
                        <input
                            type="file"
                            name="image"
                            class="form-control-file"
                            id="basic-default-company6"
                            placeholder="100" />
                        <img src="{{ asset($product->image) }}" alt="" width="80" height="60">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input
                            type="submit"
                            value="Update Product"
                            class="btn btn-info" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


