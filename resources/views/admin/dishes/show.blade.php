@extends('layouts.admin')

@section('page-title')
    Dettaglio {{ $dish->name }}
@endsection

@section('content')
    <section id="view-dish">
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-sm ms_btn my-3 mb-2">
            <i class="fa-solid fa-left-long pe-1"></i>
            Torna al dettaglio ristorante
        </a>
        @if ($dish->restaurant_id == auth()->user()->id)
            <div class="card">
                <div class="row g-0">
                    @if ($dish->image && file_exists(public_path('storage/' . $dish->image)))
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $dish->image) }}" class="img-fluid rounded-start h-100"
                                alt="{{ $dish->name }}">
                        </div>
                    @else
                        <div class="col-md-4">
                            <img src="https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png"
                                class="img-fluid rounded-start h-100 p-3" alt="{{ $dish->name }}">
                        </div>
                    @endif

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text"><small class="text-success">{{ $dish->price }} €</small></p>
                            @if ($dish->available == 1)
                                <p class="card-text"><small class="text-success">Disponibile</small></p>
                            @else
                                <p class="card-text"><small class="text-danger">Non Disponibile</small></p>
                            @endif
                            <div class="d-flex py-2">
                                <div class="pe-2">
                                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}"
                                        class="btn btn-warning text-white">
                                        Modifica
                                    </a>
                                </div>
                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>

                                    @include('partials.delete-modal')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

@endsection
