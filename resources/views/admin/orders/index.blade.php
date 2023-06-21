@extends('layouts.admin')

@section('content')
<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Email</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Stato dell'ordine</th>
        <th scope="col">Data di acquisto</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($orders as $order)

            @if ($order->restaurant_id == auth()->user()->id)

                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->guest_name }}</td>
                    <td>{{ $order->guest_surname }}</td>
                    <td>{{ $order->guest_email }}</td>
                    <td>{{ $order->guest_address }}</td>
                    <td>{{ $order->guest_phone }}</td>
                    <td>{{ $order->amount }}</td>
                    @if ($order->status == 1)
                        <td>Elaborato</td>
                    @else
                        <td>In lavorazione</td>
                    @endif
                    <td>{{ $order->date }}</td>
                </tr>

            @endif

        @endforeach

    </tbody>
  </table>

@endsection