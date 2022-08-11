<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function creditCard()
    {
        // order where user id auth
        $order = Order::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $auth_user = Auth::user();

        // Stripe Secret api key
        \Stripe\Stripe::setApiKey('sk_test_51L8o3jAgtEHU3c7wAOs4DgYaNeTCvDYJWGc7cOX1YJw8eAN4qgG9KpDHUXkG16i2P38TWHtr9Jdzzy0qolycHnbA00uMwa1yLf');

        $amount = $order->total_price;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'EUR',
            'description' => 'Pagato da '.$auth_user->name .' ' .$auth_user->surname,
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        // return view stripe credit-card
        return view('stripe.credit-card', compact('intent', 'order'));
    }

    public function afterPayment(Request $request)
    {
        dump($request->all());
    }
}
