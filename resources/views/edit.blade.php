@extends('layouts.main-layout')

@section('title', 'Edit')

@section('content')

<form action="{{ route('update', $item->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="mb-1">Item Name</label>
        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Description</label>
        <input type="text" class="form-control" name="description" value="{{ $item->description }}"">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Price</label>
        <input type="text" class="form-control" name="price" value="{{ $item->price }}">
    </div>
    <div class="mb-3">
        <label for="name" class="mb-1">Item Picture</label>
        <input type="file" class="form-control" name="picture">
    </div>
    <div class="mb-3">
        <p>Current Picture</p>
        @if($item->picture)
            <img src="{{ asset('storage/images/' . $item->picture) }}" alt="picture" style="width:200px; height:200px">
        @endif
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@endsection