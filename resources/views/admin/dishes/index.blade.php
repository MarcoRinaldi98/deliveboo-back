@extends('layouts.admin')

@section('page-title', 'Lista Piatti')

@section('content')
    <section id="my-dishes">
        <h1 class="text-center py-3">Lista dei piatti</h1>
        <table class="table table-dark mt-4">
            <thead>
                <tr class="rounded-pill">
                    <th scope="col" class="dishesIndex">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Disponibile</th>
                    <th scope="col" class="d-flex justify-content-center colspan-2">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dishes as $dish)
                    @if ($dish->restaurant_id == auth()->user()->id)
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->price }} €</td>
                            <td>{{ $dish->available ? 'Si' : 'No' }}</td>
                            <td class="d-flex justify-content-center colspan-2">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish->id) }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </div>
                                <div class="px-2">
                                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}"
                                        class="btn btn-warning text-white">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button id="delete-btn" type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    @include('partials.delete-modal')
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
