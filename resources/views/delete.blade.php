@extends('layouts.main-layout')

@section('title', 'Delete')

@section('content')

<div class="d-flex flex-row gap-4">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/images/' . $item->picture) }}" class="card-img-top" alt="picture">
        <div class="card-body">
            <h5 class="card-title mb-3">Item Name : {{ $item->name }}</h5>
            <p>Item Description : {{ $item->description }}</p>
            <p>Item Price :{{ $item->price }}</p>
        </div>
      </div>
    <div class="d-flex flex-column">
        <p>Are you sure want to delete this item?</p>
        <form action="{{ route('destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection