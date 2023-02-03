<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Payments\StripePayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function __construct(
        private StripePayment $payment
    ) { }

    /**
     * Call the stripe checkout for payment.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function checkout(Product $product)
    {
        $session = $this->payment->createSession($product);
        return redirect()->to($session->url);
    }

    /**
     * When the member successes the checkout.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function success(Request $request): RedirectResponse
    {
        Stripe::setApiKey(config('stripe.secret_key'));

        $session = Session::retrieve($request->get('session_id'));
        if (! $session) {
            throw new NotFoundHttpException();
        }

        $product = Product::where('price', $session->amount_total)->first();
        if (! $product) {
            throw new NotFoundHttpException();
        }

        $this->getUser()->increment('credits', $product->credits);
        alert()->success('Achat de crédits effectué !', "Vous avez acheté des crédits, vous pouvez maintenant les dépenser en discutant avec d'autre membre.");

        return redirect()->to(route('shop.index'));
    }

    /**
     * When a member cancel a checkout.
     *
     * @return RedirectResponse
     */
    public function cancel(): RedirectResponse
    {
        alert()->info('Achat de crédits annulé !', "Des membres n'attendent que vous pour discutez !");
        return redirect()->to(route('shop.index'));
    }
}
