<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Braintree\Transaction;
use Braintree\Configuration;
use Illuminate\Validation\ValidationException;
 
class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'guest_name' => 'required',
                'guest_surname' => 'required',
                'guest_address' => 'required',
                'guest_email' => 'required|email',
                'guest_phone' => 'required',
                'amount' => 'required',
                'date' => 'required',
                'restaurant_id' => 'required',
                'nonce' => 'nullable',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage(), 'order' => false], 400);
        }

        Configuration::environment('sandbox'); 
        Configuration::merchantId('c3ksmy3jwrcb35jv'); 
        Configuration::publicKey('2qbxs4rtwhz8kkhz'); 
        Configuration::privateKey('6633e8a5d2695c41b7dc163d9d33e52b'); 

        $nonce = $validatedData['nonce'];

        $result = Transaction::sale([
            'amount' => $validatedData['amount'],
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $order = Order::create([
                'guest_name' => $validatedData['guest_name'],
                'guest_surname' => $validatedData['guest_surname'],
                'guest_address' => $validatedData['guest_address'],
                'guest_email' => $validatedData['guest_email'],
                'guest_phone' => $validatedData['guest_phone'],
                'amount' => $validatedData['amount'],
                'date' => $validatedData['date'],
                'restaurant_id' => $validatedData['restaurant_id'],
                'nonce' => $validatedData['nonce'],
                'status' => 1, 
            ]);

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order,
            ], 201);
        } else {
            $error = $result->message;
            return response()->json(['message' => $error, 'order' => false], 400);
        }
    }
}