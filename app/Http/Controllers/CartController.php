<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();

        $items = $cart->items()->with('product')->get();

        return view('shop', compact('cart', 'items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $cart = $this->getOrCreateCart();
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);

        if ($product->stock < $quantity) {
            return back()->with('error', 'موجودی محصول کافی نیست.');
        }

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->update([
                'quantity' => $item->quantity + $quantity,
            ]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->final_price,
            ]);
        }

        return back()->with('success', 'محصول به سبد اضافه شد.');
    }

    public function remove($id)
    {
        $cart = $this->getOrCreateCart();
        $item = $cart->items()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'محصول از سبد حذف شد.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getOrCreateCart();
        $item = $cart->items()->findOrFail($id);

        if ($item->product->stock < $request->quantity) {
            return back()->with('error', 'موجودی محصول کافی نیست.');
        }

        $item->update([
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'تعداد محصول به‌روزرسانی شد.');
    }

    private function getOrCreateCart()
    {
        return Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);
    }
}
