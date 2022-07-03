<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\User\Checkout\Store;
use Auth;
use Mail;
use App\Mail\Checkout\AfterCheckout;
use Midtrans;


class CheckoutController extends Controller
{

     public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Request $request)
    {
        
        if ($product->isRegistered) {
            $request->session()->flash('error', "You already buy {$product->title}");
            return redirect(route('user.dashboard'));
        }
        
        return view('checkout.create',[
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Product $product)
    {
       
        //mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['products_id'] = $product->id;
       
        // // // create checkout
        $checkout = Checkout::create($data);
        $this->getSnapRedirect($checkout);

         // sending email
         Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

        return redirect(route('checkout.success'));
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success()
    {
            return view('checkout.success');
       
    }   
    public function getSnapRedirect(Checkout $checkout)
    {
        $orderId = $checkout->id.'-'.Str::random(5);
        $checkout->midtrans_booking_code = $orderId;
        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $checkout->Product->price 
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => 1,
            'name' => "Payment for {$checkout->Product->title}"
        ];
        $userData = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "address" => $checkout->User->address,
            "city" => "",
            "postal_code" => "",
            "phone" => $checkout->User->phone_number,
            "country_code" => "IDN",
        ];

        $customer_details = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone_number,
            "billing_address" => $userData,
            "shipping_address" => $userData,
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            
            $checkout->save();

            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }
    }

}
