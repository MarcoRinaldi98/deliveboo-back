@extends('layouts.admin')

@section('content')

    <h1 class="text-center pt-3">Modifica Ristorante</h1>

    <div class="py-5 text-center">
        <a href="{{ route('admin.restaurants.show',['restaurant' => $restaurant->id]) }}" class="btn btn-secondary">Torna alla Vista</a>
    </div>

    <form method="POST" action="{{ route('admin.restaurants.update',['restaurant'=> $restaurant->id]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" required id="name" name="name" value="{{ old('name', $restaurant->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="vat" class="form-label">Partita IVA:</label>
            <input type="text" class="form-control @error('vat') is-invalid @enderror" required id="vat" name="vat" value="{{ old('vat', $restaurant->vat) }}">
            @error('vat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo:</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" required id="address" name="address" value="{{ old('address', $restaurant->address) }}">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Numero Di telefono:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" required id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}">
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione (max 1000)(opzionale):</label>
            <textarea class="form-control @error('description') is-invalid @enderror"  id="description" name="description">{{ old('description', $restaurant->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Seleziona immagine di copertina</label>


            @if ($restaurant->image)
            <div class="my-img-wrapper">
                <img class="img-thumbnail my-img-thumb" src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"/>
                <div id="btn-delete" class="my-img-delete btn btn-danger">X</div>
            </div>
            @endif

            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="py-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    </form>

    <form id="form-delete" action="{{ route('admin.restaurants.deleteImage', ['id' => $restaurant->id]) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>

@endsection