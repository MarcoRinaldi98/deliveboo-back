@extends('layouts.admin')

@section('page-title', 'Modifica Piatto')

@section('content')
    <section id="edit-dish">
        <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h1 class="text-center pt-4">MODIFICA PIATTO</h1>

            <a href="{{ route('admin.dishes.index') }}" class="btn btn-sm ms_btn my-3 mb-2">
                <i class="fa-solid fa-left-long pe-1"></i>
                Torna al dettaglio ristorante
            </a>

            <div class="mb-3">
                <label for="available" class="form-label">Disponibile</label>
                <select class="inputColor form-select @error('available') is-invalid @enderror" name="available"
                    id="available">
                    <option @selected(old('available') == 0) value="0">No</option>
                    <option @selected(old('available') == 1) selected value="1">Si</option>
                </select>
                @error('available')
                    <div class="invalid-feedback">
                        <div class="alert alert-danger">{{ $message }}</div>
                    </div>
                @enderror
            </div>

            <div class="my-3">
                <label for="name" class="form-label">Titolo</label>
                <input type="text" class="inputColor form-control @error('name') is-invalid @enderror " id="name"
                    name="name" value="{{ old('name', $dish->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" min='0.00' max='9999.99' step='0.01'
                    class="inputColor form-control @error('price') is-invalid @enderror " id="price" name="price"
                    value="{{ old('price', $dish->price) }}">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="inputColor form-control @error('description') is-invalid @enderror" rows="5" id="description"
                    name="description">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="available" class="form-label">Disponibile</label>
                <select class="inputColor form-select @error('available') is-invalid @enderror" name="available"
                    id="available">
                    <option @selected(old('available') == 1) value="1">Si</option>
                    <option @selected(old('available') == 0) value="0">No</option>
                </select>
                @error('available')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Seleziona immagine di copertina</label>


                @if ($dish->image)
                    <div class="my-img-wrapper">
                        <img class="img-thumbnail my-img-thumb" src="{{ asset('storage/' . $dish->image) }}"
                            alt="{{ $dish->title }}" />
                        <div id="btn-delete" class="my-img-delete btn btn-danger">X</div>
                    </div>
                @endif

                <input type="file" class="inputColor form-control @error('image') is-invalid @enderror " id="image"
                    name="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn ms_btn">Aggiorna Piatto</button>
        </form>

        <form id="form-delete" action="{{ route('admin.dishes.deleteImage', ['id' => $dish->id]) }}"
            method="POST">
            @csrf
            @method('DELETE')
        </form>

    @endsection
</section>
