@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="mt-4">Category List</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success my-4">+ Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-primary text-white">ID</th>
                    <th class="bg-primary text-white">NAME</th>
                    <th class="bg-primary text-white">IMAGE</th>
                    <th class="bg-primary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>
                            <img src="{{ asset('categoryImages/' . $data->image) }}" alt="{{ $data->image }}"
                                style="width:50px; height:50px;" />
                        </th>
                        <th class="d-flex">
                            <a href="{{ route('categories.show', ['id' => $data->id]) }}"
                                class="btn btn-outline-warning me-2">Show</a>
                            <a href="{{ route('categories.edit', ['id' => $data->id]) }}"
                                class="btn btn-outline-secondary me-2">Edit</a>
                            <form action="{{ route('categories.delete', $data->id) }}" method="POST">
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
