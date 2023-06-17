@extends('layouts.admin')

@section('content')

<h1 class="text-white">Dettagli</h1>

    <div class="card my-5">
        <div class="row g-0">
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">{{$restaurant->name}}</h5>
              <p class="card-text"><small class="text-body-secondary"><span class="badge rounded-pill text-bg-secondary">{{$restaurant->id}}</small></span></p>
              <a href="{{route('admin.restaurants.index')}}" class="btn btn-secondary">Torna alla lista</a>
            </div>
          </div>
        </div>
      </div>

@endsection