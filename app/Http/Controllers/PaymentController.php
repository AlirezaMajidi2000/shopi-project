<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cart = $this->getActiveCart();

        if (!$cart || $cart->items()->count() === 0) {
            return redirect()->route('shop')->with('error', 'سبد خرید شما خالی است.');
        }

        return view('confirmpayment', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = $this->getActiveCart();

        if (!$cart || $cart->items()->count() === 0) {
            return redirect()->route('shop')->with('error', 'سبد خرید شما خالی است.');
        }

        $validated = $request->validate([
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|size:11',
            'shipping_address' => 'required|string|max:500',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $subtotal = $cart->subtotal;
        $shippingCost = 0;
        $total = $subtotal + $shippingCost;

        $payment = Payment::create([
            'cart_id' => $cart->id,
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'status' => 'pending',
            'receiver_name' => $validated['receiver_name'],
            'receiver_phone' => $validated['receiver_phone'],
            'shipping_address' => $validated['shipping_address'],
            'province' => $validated['province'],
            'city' => $validated['city'],
        ]);

        $cart->items()->delete();

        Cart::create(['user_id' => Auth::id()]);

        return redirect()->route('payment.success', $payment->id);
    }

    public function success($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->cart->user_id !== Auth::id()) {
            abort(403);
        }

        return view('modal', compact('payment'));
    }

    private function getActiveCart()
    {
        return Cart::where('user_id', Auth::id())
            ->latest()
            ->first();
    }
}
