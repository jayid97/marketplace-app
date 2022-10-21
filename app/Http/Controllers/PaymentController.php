<?php

namespace App\Http\Controllers;

use App\Mail\PaymentFail;
use App\Mail\PaymentSuccess;
use App\Models\Item;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    //

    public function index(Request $request)
    {

        //get id
         $item = Item::where('id', $request->id)->first();

         if($item->user_id != Auth::user()->id)
         {
            return $this->beginPayment($item);
         }else{
            return redirect()->back()->withErrors('Seller and Buyer cannot be same person!');
         }
        
    }

    public function getGateway()
    {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->initialize([
            'username' => env('PAYPAL_USERNAME'),
            'password' => env('PAYPAL_PASSWORD'),
            'signature' => env('PAYPAL_SIGNATURE'),
            'testMode' => env('PAYPAL_TESTMODE'),
        ]);

        return $gateway;
    }

    public function getPayload($item)
    {
        return [
            'amount' => sprintf('%.2f', $item->price),
            'currency' => 'MYR',
        ];
    }

    public function beginPayment($item)
    {
        $gateway = $this->getGateway();

        $response = $gateway->purchase(
            [
                ...$this->getPayload($item),
                'returnUrl' => route('payment.return', ['item' => $item]),
                'cancelUrl' => route('payment.cancel', ['item' => $item]),
            ]
        )->send();

        // Process response
        if ($response->isSuccessful()) {

            // Payment was successful
            return $this->_success($item);

        } elseif ($response->isRedirect()) {

            // Redirect to offsite payment gateway
            $response->redirect();

        } else {

            return $this->_failed($item, $response->getMessage());
        }

    }

    public function paymentCancel(Item $item)
    {
        return $this->_failed($item, 'Payment Cancelled');
    }

    public function paymentReturn(Request $request, Item $item)
    {
        $gateway = $this->getGateway();
        $response = $gateway->completePurchase(
            [
                ...$request->input(),
                ...$this->getPayload($item),
            ]
        )->send();

        $item->payment_gateway_status = json_encode($response->getData());
        $item->save();

        if ($response->isSuccessful()) {
            return $this->_success($item);
        } else {

            return $this->_failed($item, $response->getMessage());
        }
    }

    public function _success(Item $item)
    {

        //send email
        Mail::to(Auth::user()->email)
            ->send(new PaymentSuccess($item));

        $rating = Rating::create([
            'buyer_id' => $item->user_id,
            'seller_id' => Auth::user()->id,
            'items_id' => $item->id,
        ]);

        $item->update([
            'status' => 'Paid',
            'buyer_id' => Auth::user()->id,
            'rating_id' =>$rating->id,
        ]);

       
        return redirect(route('payment.success', ['item' => $item]));

    }

    public function success(Item $item)
    {
        return view('payment.success', compact('item'));
    }

    public function _failed(Item $item, $reason)
    {
        $item->update(['status' => 'Cancelled']);
        return redirect(route('payment.failed', ['item' => $item, 'reason' => $reason]));

    }

    public function failed(Request $request, Item $item)
    {
         //send email
         Mail::to(Auth::user()->email)
         ->send(new PaymentFail($item));
        return view('payment.failed', compact('item'));
    }
}
