<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('price')->get();

        return view('admin.products.index', [
            'user' => $this->getUser(),
            'products' => $products
        ]);
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'user' => $this->getUser(),
            'product' => $product
        ]);
    }

    public function update(AdminProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->fill($request->validated());
        $product->save();

        alert()->success("Vous avez modifier le pack $product->name");

        return redirect()->to(
            route('admin.product.index')
        );
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'user' => $this->getUser(),
        ]);
    }

    public function store(AdminProductUpdateRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        alert()->success("Vous avez créer un tout nouveau pack !");

        return redirect()->to(
            route('admin.product.index')
        );
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        alert()->success("Vous avez supprimé un pack.");

        return redirect()->to(
            route('admin.product.index')
        );
    }
}
