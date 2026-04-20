<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cartItems = CartItem::where('user_id', auth()->id())
            ->with('product.category')
            ->get();

        $total = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(StoreCartRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->product_id);

        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $newQuantity = min($cartItem->quantity + $request->quantity, $product->stock);
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => min($request->quantity, $product->stock),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function update(CartItem $cartItem, StoreCartRequest $request): RedirectResponse
    {
        $cartItem->quantity = min($request->quantity, $cartItem->product->stock);
        $cartItem->save();

        return back()->with('success', 'Cart updated');
    }

    public function remove(CartItem $cartItem): RedirectResponse
    {
        $cartItem->delete();

        return back()->with('success', 'Item removed from cart');
    }

    public function clear(): RedirectResponse
    {
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared');
    }
}
