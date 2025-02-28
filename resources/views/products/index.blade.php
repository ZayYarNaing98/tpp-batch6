@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4">Product Lists</h1>
    <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4">+ Create</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">DESCRIPTION</th>
                <th class="bg-primary text-white">PRICE</th>
                <th class="bg-primary text-white">CATEGORY</th>
                <th class="bg-primary text-white">STATUS</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $data)
                <tr>
                    <th>{{ $data['id'] }}</th>
                    <th>{{ $data['name'] }}</th>
                    <th>{{ $data['description'] }}</th>
                    <th>{{ $data['price'] }}</th>
                    <th>{{ $data['category']['name'] }}</th>
                    <th>
                        @if ($data->status === 1)
                            <span class="text-success">Active</span>
                        @else
                            <span class="text-danger">Suspend</span>
                        @endif
                    </th>
                    <th class="d-flex">
                        <a href="{{ route('products.show', ['id' => $data->id]) }}"
                            class="btn btn-outline-warning me-2">Show</a>
                        <a href="{{ route('products.edit', ['id' => $data->id]) }}"
                            class="btn btn-outline-secondary me-2">Edit</a>
                        <form action="{{ route('products.delete', $data->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
