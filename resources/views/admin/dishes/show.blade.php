@extends('layouts.admin')

@section('content')
      
          @if ($dish->restaurant_id == auth()->user()->id)

            <div class="card ms-3 mt-5">
              <div class="row g-0">
                @if ($dish->image)
                    <div class="col-md-4">
                      <img src="{{ asset('storage/'. $dish->image) }}" class="img-fluid rounded-start h-100" alt="{{ $dish->name }}">
                    </div>
                @else
                    <div class="col-md-4">
                        <img src="https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png" class="img-fluid rounded-start h-100 p-3" alt="{{ $dish->name }}">
                    </div>
                @endif
                
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ $dish->price }}</small></p>
                    @if ($dish->available == 1)
                      <p class="card-text"><small class="text-body-secondary">Disponibile</small></p>
                      @else
                      <p class="card-text"><small class="text-body-secondary">Non Disponibile</small></p>
                    @endif

                  </div>
                </div>
              </div>
            </div>

          @endif

@endsection