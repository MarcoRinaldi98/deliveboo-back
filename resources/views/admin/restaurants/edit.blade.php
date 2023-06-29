@extends('layouts.admin')

@section('page-title', 'Modifica Ristorante')

@section('content')
    <section id="edit-restaurant">
        <h1 class="text-center pt-3">Modifica Ristorante</h1>

        <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id]) }}" class="btn btn-sm ms_btn my-2">
            <i class="fa-solid fa-left-long pe-1"></i>
            Torna al dettaglio ristorante
        </a>

        <form method="POST" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->id]) }}"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="inputColor form-control @error('name') is-invalid @enderror" required
                    id="name" name="name" value="{{ old('name', $restaurant->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vat" class="form-label">Partita IVA:</label>
                <input type="number" class="inputColor form-control @error('vat') is-invalid @enderror" required
                    id="vat" name="vat" value="{{ old('vat', $restaurant->vat) }}">
                @error('vat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo:</label>
                <input type="text" class="inputColor form-control @error('address') is-invalid @enderror" required
                    id="address" name="address" value="{{ old('address', $restaurant->address) }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Numero Di telefono:</label>
                <input type="number" class="inputColor form-control @error('phone') is-invalid @enderror" required
                    id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione:</label>
                <textarea class="inputColor form-control @error('description') is-invalid @enderror" rows="5" id="description"
                    name="description">{{ old('description', $restaurant->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Seleziona immagine di copertina</label>


                @if ($restaurant->image)
                    <div class="my-img-wrapper">
                        <img class=" inputColor img-thumbnail my-img-thumb"
                            src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" />
                        <div id="btn-delete" class="btn btn-danger">X</div>
                    </div>
                @endif

                <input type="file" class="inputColor form-control @error('image') is-invalid @enderror" id="image"
                    name="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 row">
                @foreach ($types as $type)
                    <div>
                        <label for="{{ $type->id }}"
                            class="col-5 col-md-2 col-form-label text-md-right">{{ $type->name }}</label>
                        <input id="{{ $type->id }}" class="@error('types') is-invalid @enderror" type="checkbox"
                            name="types[]" value="{{ $type->id }}" @if (collect(old('types', $selectedTypes))->contains($type->id)) checked @endif>
                    </div>
                @endforeach
                @error('types')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="py-3">
                <button type="submit" class="btn ms_btn" id="prova">Salva</button>
            </div>
        </form>

        <form id="form-delete" action="{{ route('admin.restaurants.deleteImage', ['id' => $restaurant->id]) }}"
            method="POST">
            @csrf
            @method('DELETE')
        </form>
    </section>
@endsection
