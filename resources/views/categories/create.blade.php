@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="mt-4 text-danger">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card mt-4">
            <div class="card-header">
                + Create
            </div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Category Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category Name" />
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">Category Image:</label>
                    <input type="file" name="image" class="form-coltrol" id="image" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary me-2" type="submit">
                        Submit
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
