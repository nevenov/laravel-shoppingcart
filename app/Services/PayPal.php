<?php
namespace App\Services;

use PayPal\Api\{Payer,Item,ItemList,Details,Amount,Transaction,RedirectUrls,Payment};

class PayPal {

    public function createPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        foreach(session('cart') as $product)
        {
            $items[] = $item = new Item();
            $item->setName($product['name'])
                ->setCurrency('USD')
                ->setQuantity($product['amount'])
                ->setPrice($product['price']);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(session('cart_data.total_price'));

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(session('cart_data.total_price'))
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('execute-payment'))
            ->setCancelUrl(route('cart'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_CLIENT_SECRET')
            )
        );

        $payment->create($apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return $approvalUrl;
    }

}
