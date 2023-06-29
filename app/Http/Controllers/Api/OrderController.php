<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati del form (opzionale)
        $validatedData = $request->validate([
            'guest_name' => 'required',
            'guest_surname' => 'required',
            'guest_address' => 'required',
            'guest_email' => 'required|email',
            'guest_phone' => 'required',
            'amount'=>'required',
            'status'=>'required',
            'date'=>'required',
            'restaurant_id'=>'required'
        ]);

        // Creazione dell'ordine nel database
        $order = Order::create([
            'guest_name' => $validatedData['guest_name'],
            'guest_surname' => $validatedData['guest_surname'],
            'guest_address' => $validatedData['guest_address'],
            'guest_email' => $validatedData['guest_email'],
            'guest_phone' => $validatedData['guest_phone'],
            'amount' => $validatedData['amount'],
            'status' => $validatedData['status'],
            'date' => $validatedData['date'],
            'restaurant_id' => $validatedData['restaurant_id'],
        ]);

        // Puoi eseguire altre operazioni qui, come inviare notifiche o aggiornare altre tabelle nel database

        // Restituzione della risposta
        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order,
        ], 201);
    }
}