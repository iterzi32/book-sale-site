<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = $this->getOrCreate();
        return view('front.dashboard.cart.index', ['cart' => $cart]);
    }

    public function add(Product $product, int $quantity = 1): RedirectResponse
    {
        $cart = $this->getOrCreate();
        $cartDetails = new CartDetails(
            [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity
            ]
        );

        $cartDetails->save();
        return redirect()->route('user.index')->with('info', 'Ürün sepet eklendi');
    }

    private function getOrCreate(): Cart
    {
        $id = Auth::id();
        $cart = Cart::firstOrCreate(
            ['user_id' => $id, 'is_active' => true],
            ['code' => Str::random(8)]
        );
        return $cart;
    }

    public function destroy(CartDetails $details): RedirectResponse
    {
        $details->forceDelete();
        return redirect()->route('cart.index');
    }
}
