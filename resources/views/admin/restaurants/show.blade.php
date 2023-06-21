@extends('layouts.admin')

@section('content')

@foreach ($restaurants as $restaurant)
    @auth
        @if ($restaurant->user_id == auth()->user()->id)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 py-3 pe-2">
                        <img src="{{ asset('storage/'. $restaurant->image) }}" class="img-fluid rounded-start h-100" alt="{{ $restaurant->name }}">
                    </div>
                    <div class="col-md-8 py-3">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">{{ $restaurant->address }}</p>
                        <p class="card-text">{{ $restaurant->vat }}</p>
                        <p class="card-text">{{ $restaurant->phone }}</p>
                        <p class="card-text">{{ $restaurant->description }}</p>
                        <div class="px-2">
                            <a href="{{route('admin.admin.restaurants.edit', ['restaurant' => $restaurant->id])}}" class="btn btn-info text-white">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endforeach

@endsection