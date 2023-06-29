@extends('layouts.admin')

@section('page-title', 'Dettaglio Ristorante')

@section('content')
    @foreach ($restaurants as $restaurant)
        @auth
            @if ($restaurant->user_id == auth()->user()->id)
                <section id="my-restaurant" class="py-5">
                    <div class="d-flex justify-content-around align-items-center pb-5">
                        <i class="fa-solid fa-utensils fs-1"></i>
                        <h2 class="text-center fs-3 fs-md-1 infoshow">INFO RISTORANTE</h2>
                        <div class="px-2">
                            <a href="{{ route('admin.admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}"
                                class="btn ms_btn">Modifica Informazioni</a>
                        </div>
                    </div>
                    <h1 class="fs-1">{{ $restaurant->name }}</h1>
                    <div class="row g-0">
                        @if ($restaurant->image && file_exists(public_path('storage/' . $restaurant->image)))
                            <div class="col-12 col-xl-6 p-xl-5">
                                <img src="{{ asset('storage/' . $restaurant->image) }}" class="img-fluid rounded"
                                    alt="{{ $restaurant->name }}">
                            </div>
                        @else
                            <div class="col-12 col-xl-6 p-xl-5">
                                <img src="https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png"
                                    class="img-fluid rounded" alt="{{ $restaurant->name }}">
                            </div>
                        @endif

                        <div class="col-12 col-xl-6">
                            <p class="p-xl-5 pt-3">{{ $restaurant->description }}</p>
                        </div>

                        <div class="d-flex text-start justify-content-around align-items-center">
                            <div>
                                <div>Indirizzo:</div>
                                <small class="card-text">{{ $restaurant->address }}</small>
                            </div>
                            <div>
                                <div>Numero di telefono:</div>
                                <small class="card-text">{{ $restaurant->phone }}</small>
                            </div>
                            <div>
                                <div>Partita IVA:</div>
                                <small class="card-text">{{ $restaurant->vat }}</small>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endauth
    @endforeach
@endsection
