<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Braintree\Gateway;

class OrderController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function createOrder(Request $request)
    {
        // Ottieni i dati del pagamento dalla richiesta
        $paymentData = $request->input('paymentData');

        // Esegui la transazione di pagamento con Braintree
        $result = $this->gateway->transaction()->sale([
            'amount' => $paymentData['amount'],
            'paymentMethodNonce' => $paymentData['nonce'],
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        // Verifica il risultato della transazione
        if ($result->success) {
            // La transazione è andata a buon fine, salva l'ordine nel database
            $order = new Order();
                $order->guest_name = $request->input('guest_name');
                $order->guest_surname = $request->input('guest_surname');
                $order->guest_address = $request->input('guest_address');
                $order->guest_email = $request->input('guest_email');
                $order->guest_phone = $request->input('guest_phone');
                $order->nonce = $request->input('nonce');
            $order->save();

            // Esegui il redirect alla pagina di conferma dell'ordine
            return redirect()->route('order');
        } else {
            // La transazione non è andata a buon fine, restituisci un messaggio di errore
            return response()->json(['success' => false, 'message' => 'Errore durante il pagamento']);
        }
    }

}
