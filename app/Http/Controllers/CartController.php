<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();

        $items = $cart->items()->with('product')->get();
        $subtotal = $items->sum(fn ($item) => $item->unit_price * $item->quantity);
        $discountPercent = $cart->discount_percent ?? 0;
        $discountAmount  = $subtotal * $discountPercent / 100;
        $shipping = $items->count() > 0 ? 50000 : 0;
        $total = $subtotal - $discountAmount + $shipping;
        $cart->update([
            'subtotal' => $subtotal,
            'total'    => $total,
        ]);

        return view('shop', compact(
            'cart',
            'items',
            'subtotal',
            'discountPercent',
            'discountAmount',
            'shipping',
            'total'
        ));
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
        return Cart::where('user_id', Auth::id())
            ->latest()
            ->first()
            ?? Cart::create(['user_id' => Auth::id()]);
    }



    public function applyDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50',
        ]);

        $cart = $this->getOrCreateCart();

        if ($cart->items()->count() === 0) {
            return back()->with('error', 'سبد خرید شما خالی است.');
        }

        $code = DiscountCode::where('code', strtoupper(trim($request->code)))->first();

        if (! $code) {
            return back()->with('error', 'کد تخفیف معتبر نیست.');
        }

        if (! $code->isActive()) {
            return back()->with('error', 'این کد تخفیف منقضی یا استفاده شده است.');
        }

        $cart->update([
            'discount_code_id' => $code->id,
            'discount_percent' => $code->percent,
        ]);

//        $code->markAsUsed();

        return back()->with('success', "تخفیف {$code->percent} درصدی اعمال شد.");
    }

    public function removeDiscount()
    {
        $cart = $this->getOrCreateCart();

        $cart->update([
            'discount_code_id' => null,
            'discount_percent' => 0,
        ]);

        return back()->with('success', 'کد تخفیف حذف شد.');
    }
}
