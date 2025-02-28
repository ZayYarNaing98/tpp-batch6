@extends('layouts.master')
@section('content')
    <div>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    Product Detail
                </div>
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" value="{{ $product->name }}" class=" form-control" />
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" value="{{ $product->description }}" class=" form-control" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" value="{{ $product->price }}" class=" form-control" />
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Active or Inactive</label>
                        <input class="form-check-input" name="status" type="checkbox" role="switch"
                            {{ $product->status === 1 ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
