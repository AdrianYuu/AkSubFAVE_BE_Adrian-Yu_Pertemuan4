@extends('layouts.main-layout')

@section('title', 'Add')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="m-auto col-8">
    @csrf
    <div class="mb-3">
        <label for="name" class="mb-1">Item Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Description</label>
        <input type="text" class="form-control" name="description">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Price</label>
        <input type="text" class="form-control" name="price">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Picture</label>
        <input type="file" class="form-control" name="picture">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection