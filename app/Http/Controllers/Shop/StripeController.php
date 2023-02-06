<?php

namespace App\Http\Controllers\Shop;

use App\Actions\User\IncrementUserCreditAction;
use Stripe\Stripe;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Payments\StripePayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    /**
     * Instancie la classe StripePayment.
     *
     * @param StripePayment $payment
     */
    public function __construct(
        private StripePayment $payment
    ) { }

    /**
     * Appelle le paiement de Stripe et l'envoie sur la page correcte.
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
     * L'utilisateur a bien payé son produit.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Stripe\Exception\ApiErrorException
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

        app(IncrementUserCreditAction::class)->execute(
            $this->getUser(),
            $product->credits
        );

        alert()->success('Achat de crédits effectué !', "Vous avez acheté des crédits, vous pouvez discuter tranquillement.");

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
