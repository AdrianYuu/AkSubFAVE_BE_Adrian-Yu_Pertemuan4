@extends('layouts.main-layout')

@section('title', 'List')

@section('content')

@if(Cookie::has('email'))
<h1 class="mb-5">Cookie Email: {{ Cookie::get('email') }}</h1>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Item Name</th>
            <th class="text-center">Item Description</th>
            <th class="text-center">Item Price</th>
            <th class="text-center">Item Picture</th>
            @if(Auth::user()->is_admin == 1)
            <th class="text-center">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($itemList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>Rp {{ $item->price }}</td>
                <td><img src="{{ asset('storage/images/' . $item->picture) }}" alt="itemPicture" style="width:200px; height:200px"></td>
                @if(Auth::user()->is_admin == 1)
                <td>
                    <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('delete', $item->id) }}" class="btn btn-danger">Delete</a>
                </td>
                @endif
            </tr>
        @empty
            <h1 class="mb-4">There is no item!</h1>
        @endforelse
    </tbody>
</table>

@endsection