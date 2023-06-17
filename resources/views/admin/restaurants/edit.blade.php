@extends('layouts.admin')

@section('content')

    <h1 class="text-center pt-3">Crea un nuovo Project</h1>

    <div class="py-5 text-center">
        <a href="{{route('admin.restaurants.index')}}" class="btn btn-secondary">Torna alla lista</a>
    </div>

    <form method="POST" action="{{route('admin.restaurants.update',['restaurant'=> $restaurant->id])}}" enctype=“multipart/form-data”>

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $restaurant->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione (max 1000)(opzionale):</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $restaurant->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="py-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    </form>

@endsection