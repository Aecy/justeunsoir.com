<?php

namespace App\Http\Controllers\Shop;

use App\Actions\User\IncrementUserCreditAction;
use App\Enums\Order\OrderProviderEnum;
use App\Enums\Order\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaypalController extends Controller
{
    private ApiContext $apiContext;

    public function __construct()
    {
        $paypalConfiguration = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfiguration['client_id'],
                $paypalConfiguration['secret']
            )
        );

        $this->apiContext->setConfig(
            $paypalConfiguration['settings']
        );
    }

    public function checkout(Product $product): RedirectResponse
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($product->name)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($product->price / 100);

        $items = new ItemList();
        $items->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($product->price / 100);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($items)
            ->setDescription("Achat du {$product->name}");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.status'))
            ->setCancelUrl(route('paypal.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            $order = Order::create([
                'provider' => OrderProviderEnum::PAYPAL,
                'user_id' => $this->getUser()->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'status' => OrderStatusEnum::PENDING,
            ]);
        } catch (PayPalConnectionException $ex) {
            alert()->error("Vous avez perdu la connexion avec paypal.");
            return redirect()->to(route('shop.index'));
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectUrl = $link->getHref();
                break;
            }
        }

        Session::put('cur_order_id', $order->id);
        Session::put('pp_payment_id', $payment->getId());

        if (isset($redirectUrl)) {
            return redirect()->away($redirectUrl);
        }

        alert()->error("Une erreur inconnue est survenue...");
        return redirect()->back();
    }

    public function status(Request $request): RedirectResponse
    {
        $paymentId = Session::get('pp_payment_id');
        $orderId = Session::get('cur_order_id');
        Session::forget('cur_order_id');
        Session::forget('pp_payment_id');

        $order = Order::whereId($orderId)->where('status', OrderStatusEnum::PENDING)->first();
        if (! $order) {
            throw new NotFoundHttpException();
        }

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            $order->status = OrderStatusEnum::CANCELLED;
            $order->save();

            alert()->info("Paiement annulé", "Vous n'avez pas été débité car vous avez annulé le paiement.");

            return redirect()->to(
                route('shop.index')
            );
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        $result = $payment->execute(
            $execution,
            $this->apiContext
        );

        if ($result->getState() == 'approved') {
            $amount = intval($result->transactions[0]->getAmount()->total) * 100;
            $product = Product::where('price', $amount)->first();

            if (! $product) {
                throw new NotFoundHttpException();
            }

            app(IncrementUserCreditAction::class)->execute(
                $this->getUser(),
                $product->credits
            );

            $order->status = OrderStatusEnum::VALIDATED;
            $order->save();

            alert()->success('Achat de crédits effectué !', "Vous avez acheté des crédits, vous pouvez discuter tranquillement.");

            return redirect()->to(
                route('shop.index')
            );
        }

        $order->status = OrderStatusEnum::CANCELLED;
        $order->save();

        alert()->info("Paiement annulé", "Vous n'avez pas été débité car vous avez annulé le paiement.");
        return redirect()->to(
            route('shop.index')
        );
    }
}
