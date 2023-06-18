@extends('layouts.admin')

@section('content')
<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dishes as $dish)
          <tr>
            <td>{{ $dish->id }}</td>
            <td>{{ $dish->name }}</td>
            <td class="d-flex">
              <div>
                <a class="btn btn-primary" href="{{route('admin.dishes.show', $dish->id)}}">VEDI</a>
              </div>
              <div class="px-2">
                <a href="{{route('admin.dishes.edit', ['dish' => $dish->id])}}" class="btn btn-info text-white">Modifica</a>
              </div>
              <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Vuoi Eliminare?');">
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