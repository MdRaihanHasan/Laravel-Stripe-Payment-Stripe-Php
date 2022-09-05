<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Stripe;

class PaymentController extends Controller
{
  

    public function stripe()

    {

        return view('stripe/stripe');

    }


    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => 10000 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test Payment" 

        ]);

          Session::flash('success', 'Payment successful!');

        return back();

    }
}