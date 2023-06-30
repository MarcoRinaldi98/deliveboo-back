<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Mail\ClientMail;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Faker\Generator as Faker;

class PaymentController extends Controller
{

    public function getToken()
    {

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key')
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return response()->json([
            'success' => 'true',
            'clientToken' => $clientToken,
        ]);
    }

    public function processPayment(Request $request, Faker $faker)
    {

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key')
        ]);

        // Creazione di un codice ordine unico
        $data = $request->order;
        do {
            $data['order_code'] = $faker->regexify('[A-Z0-9]{32}');
        } while (Order::where('order_code', $data['order_code'])->first());

        // Validazione input utente
        $validator = Validator::make(
            $data,
            [
                'guest_name' => 'required|max:100',
                'guest_surname' => 'required|max:100',
                'guest_email' => 'required|email|max:50',
                'guest_address' => 'required|max:100',
                'guest_phone' => ['required', 'max:10', 'not-regex:/[^0-9]/i'],
                'amount' => 'decimal:0,2|between:0,9999'
            ],
            [
                'required' => 'Il campo :attribute non può essere vuoto.',
                'guest_name.max' => 'Il :attribute non può superare i 100 caratteri.',
                'guest_surname.max' => 'Il :attribute non può superare i 100 caratteri.',
                'guest_email.max' => 'La :attribute supera la lunghezza massima consentita (50 caratteri).',
                'guest_phone.max' => 'Il :attribute è composto da 10 cifre al massimo.',
                'guest_phone.not-regex' => 'Il :attribute può contenere solo cifre numeriche.',
                'total.decimal' => 'Si è verificato un errore imprevisto.',
                'total.between' => 'Si è verificato un errore imprevisto.',
            ],
            [
                'guest_name' => 'Nome',
                'guest_surname' => 'Nome',
                'guest_email' => 'E-mail',
                'guest_address' => 'Indirizzo',
                'guest_phone' => 'Numero di telefono',
                'amount' => 'Totale',
            ]
        );

        if ($validator->fails()) {
            //errori negli input
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }

        //Validazione pagamento di braintree
        $result = $gateway->transaction()->sale([
            'amount' => $request->order['amount'],
            'paymentMethodNonce' => $request->paymentMethodNonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            //Pagamento riuscito, creo l'ordine
            $newOrder = new Order();
            $newOrder->fill($data);
            $newOrder->save();

            if ($data['dish']) {
                foreach ($data['dish'] as $dish) {
                    $newOrder->dish()->attach($dish['id'], ['quantity' => $dish['quantity']]);
                }
            }


            return response()->json([
                'message' => 'Payment successful',
                'orderCode' => $newOrder->order_code,
                'success' => true
            ]);
        } else {
            // Pagamento Fallito
            return response()->json([
                'message' => 'Il pagamento non è andato a buon fine.',
                'success' => false
            ]);
        }
    }
}
