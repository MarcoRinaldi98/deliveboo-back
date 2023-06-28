<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function sentOrder(Request $request)
    {
        
        $order = new Order();
            $order->guest_name = $request->input('guest_name');
            $order->guest_surname = $request->input('guest_surname');
            $order->guest_address = $request->input('guest_address');
            $order->guest_email = $request->input('guest_email');
            $order->guest_phone = $request->input('guest_phone');
            $order->nonce = $request->input('nonce');
        $order->save();

        // Restituisci una risposta di conferma al client
        return response()->json(['success' => true, 'message' => 'Ordine completato con successo']);

    }
}
