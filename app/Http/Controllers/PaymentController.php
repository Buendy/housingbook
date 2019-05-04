<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $payal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $payal_conf['client_id'],
            $payal_conf['secret']
        ));
        $this->_api_context->setConfig($payal_conf['settings']);
    }

    public function payPaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName($request->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice($request->amount * session('days'));


        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->amount * session('days'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description");

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(url('paypal/status')) /** Specify return URL **/
        ->setCancelUrl(url('paypal-status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                session()->put('error', 'Connection timeout');
                return redirect('public/apartments');
            } else {
                session()->put('error', 'Some error occur, sorry for inconvenient');
                return redirect('public/apartments');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        session()->put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return redirect($redirect_url);
        }
        session()->put('error', 'Unknown error occurred');
        return redirect('public/apartments');


    }


    public function getStatus(Request $request)
    {

        $apartment = session('apartmentReservado');

        /** Get the payment ID before session clear **/
        $pay_id = session('paypal_payment_id');


        /** clear the session payment ID **/


        if (empty($request->PayerID) || empty($request->token)) {
            session()->put('error', 'Payment failed');
            return redirect('public/apartments');
        }

        $payment = Payment::get($pay_id, $this->_api_context);

        $execution = new PaymentExecution();


        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);


        session()->forget('paypal_payment_id');
        if ($result->getState() == 'approved') {
            return redirect('rent/store/' . $apartment->id);
        }else{
            session()->put('error', 'Payment failed');

            return redirect('public/apartments');
        }



    }
}
