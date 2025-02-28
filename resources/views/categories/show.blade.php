@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Category Detail
            </div>
            <div class="card-body">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" value="{{ $category->name }}" />
            </div>
            <div class="card-body">
                <label for="image" class="form-label">Category Image:</label>
                <img src="{{ asset('categoryImages/' . $category->image) }}" alt="{{ $category->image }}"
                    style="width:50px; height:50px" />
            </div>
            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
