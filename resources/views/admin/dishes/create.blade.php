@extends('layouts.admin')

@section('page-title', 'Crea un nuovo piatto')

@section('content')
    <section id="create-dish">
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h1 class="text-center pt-4">AGGIUNGI NUOVO PIATTO</h1>
            <input type="hidden" name="restaurant_id"
                @foreach ($restaurants as $restaurant)
        @if ($restaurant->user_id == auth()->user()->id)
            value="{{ $restaurant->id }}"
        @endif @endforeach>
            <div class="mb-3">
                <label for="name" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " required id="name"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" min='0.00' max='9999.99' step='0.01'
                    class=" inputColor form-control @error('price') is-invalid @enderror " required id="price"
                    name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="inputColor form-control @error('description') is-invalid @enderror" rows="5" id="description"
                    name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="available" class="form-label">Disponibile</label>
                <select class="inputColor form-select @error('available') is-invalid @enderror" name="available"
                    id="available">
                    <option @selected(old('available') == 0) value="0" class="inputColor">No</option>
                    <option @selected(old('available') == 1) selected value="1" class="inputColor">Si</option>
                </select>
                @error('available')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="image" class="form-label">Seleziona immagine di copertina</label>

                <input type="file" name="image" accept="image/*"
                    class="inputColor form-control @error('image') is-invalid @enderror " id="image">
                @error('image')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn ms_btn">Aggiungi Piatto</button>
        </form>
    </section>
@endsection
