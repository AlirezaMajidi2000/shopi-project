<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopi | سبد خرید</title>

    <link rel="stylesheet" href="{{ asset('assets/style/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
</head>

<body class="font_vazir">

<nav class="nav font_vazir">
    <div class="my_container">

        <div class="nav_items">

            <div class="logo">
                <a href="{{ route('home') }}">
                    <span class="logo_text font_saleh">شاپی</span>
                </a>
            </div>

            <button class="menu_toggle" aria-label="باز کردن منو" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="nav_menu">

                <div class="search_box">
                    <label class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input
                            class="search_input font_vazir"
                            type="search"
                            placeholder="جستجوی محصول..."
                            maxlength="100"
                        >
                    </label>
                </div>

                <div class="nav_links">

                    <div class="login_box">
                        <a href="{{ route('login') }}" class="login_link">ورود/ثبت نام</a>
                    </div>

                    <div class="favorite_box">
                        <a href="#">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                    </div>

                    <div class="shop_box">
                        <a href="{{ route('shop') }}">
                            <i class="fa-regular fa-cart-shopping"></i>
                            @if(($cartCount ?? 0) > 0)
                                <span class="cart_badge" id="cartCount">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</nav>

<div class="my_container">


    <div class="my_container">

        @if(session('success'))
            <div class="alert alert-success" style="background:#d4edda; color:#155724; padding:12px 16px; margin:16px 0; border-radius:8px; border:1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="background:#f8d7da; color:#721c24; padding:12px 16px; margin:16px 0; border-radius:8px; border:1px solid #f5c6cb;">
                {{ session('error') }}
            </div>
        @endif

        <div class="shop_items_box">
            ...
        </div>
    </div>

    <div class="shop_items_box">
        <div class="shop_title">
            <a href="{{ route('home') }}" aria-label="بازگشت به فروشگاه">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <h2>سبد خرید</h2>
        </div>


        @include('partials.cart_items', ['$items' => $items])

        <div class="total_items">

            <div class="total_item">
                <span class="color_secondary">جمع کل محصولات</span>
                <span class="cart_subtotal">{{ number_format($cart->subtotal) }} تومان</span>
            </div>

            <div class="discount_items">
                <span class="color_secondary">کد تخفیف</span>

                @if($cart->discount_percent > 0)
                    <div class="discount_input_box">
                        <span class="text_success">تخفیف {{ $cart->discount_percent }}٪ اعمال شد</span>

                        <form action="{{ route('cart.discount.remove') }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="discount_btn">حذف کد</button>
                        </form>
                    </div>
                @else
                    <form action="{{ route('cart.discount') }}" method="POST" class="discount_input_box">
                        @csrf
                        <input
                            type="text"
                            name="code"
                            class="discount_input font_vazir"
                            placeholder="کد تخفیف"
                            maxlength="30"
                        >
                        <button type="submit" class="discount_btn">اعمال</button>
                    </form>
                @endif
            </div>

            @if($cart->discount_percent > 0)
                <div class="total_item">
                    <span class="color_secondary">تخفیف ({{ $cart->discount_percent }}٪)</span>
                    <span class="text_success">- {{ number_format($cart->discount_amount) }} تومان</span>
                </div>
            @endif

            <div class="cost_items">
                <span class="color_secondary">هزینه ارسال</span>
                <span class="shipping_cost">
                    {{ number_format($items->count() > 0 ? 50000 : 0) }} تومان
                </span>
            </div>

        </div>

        <div class="payment">

            <div class="total_payment">
                <span class="text_primary">مبلغ قابل پرداخت</span>
                <span class="text_success cart_total">{{ number_format($cart->total) }} تومان</span>
            </div>

            <a href="{{ route('confirmpayment') }}" class="btn_submit">
                <span>ادامه خرید</span>
            </a>

        </div>

    </div>
</div>

{{-- داده‌های اولیه برای JS --}}
<script>
    window.__SHOP_DATA__ = {
        cart: {
            items: @json($items),
            subtotal: {{ (int) $cart->subtotal }},
            total: {{ (int) $cart->total }}
        }
    };
</script>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/shop.js') }}?v={{ time() }}" defer></script>





</body>
</html>
