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

        // auth user
        $auth_user = Auth::user();

        // Stripe Secret api key
        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));

        $amount = $order->total_price;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Bounce Shop Test Payment',
            'amount' => $amount,
            'currency' => 'EUR',
            'description' => 'Pagato da '.$auth_user->name .' ' .$auth_user->surname,
            'payment_method_types' => ['card'],
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);
        $intent = $payment_intent->client_secret;

        // return view stripe credit-card
        return view('stripe.credit-card', compact('intent', 'order'));
    }

    public function afterPayment()
    {
        // order where user id auth
        $order = Order::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        // order status
        $order->status = 1;

        // order save
        $order->save();

        // redirect to url /payment success
        return redirect()->to('/payment-success');
    }
}
