@extends('layouts.admin')

@section('content')
<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
          <tr>
            <td>{{ $restaurant->id }}</td>
            <td>{{ $restaurant->name }}</td>
            <td class="d-flex">
              <div>
                <a class="btn btn-primary" href="{{route('admin.restaurants.show', $restaurant->id)}}">VEDI</a>
              </div>
              <div class="px-2">
                <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}" class="btn btn-info text-white">Modifica</a>
              </div>
              <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST" onsubmit="return confirm('Vuoi Eliminare?');">
                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Elimina</button>
              </form>
  
            </td>

          </tr>
        @endforeach
    </tbody>
  </table>

@endsection