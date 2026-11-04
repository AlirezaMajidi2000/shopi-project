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
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</nav>

<div class="my_container">
    <div class="shop_items_box">
        <div class="shop_title">
            <a href="{{ route('home') }}" aria-label="بازگشت به فروشگاه">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <h2>سبد خرید</h2>
        </div>

        <table class="shop_items">
            <thead>
            <tr>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody class="cart_items">
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:60px;">
                            <button type="submit">به‌روزرسانی</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->unit_price * $item->quantity) }} تومان</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">سبد خرید خالی است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="total_items">

            <div class="total_item">
                <span class="color_secondary">جمع کل محصولات</span>
                <span class="cart_subtotal">{{ number_format($cart->subtotal) }} تومان</span>
            </div>

            <div class="cost_items">
                <span class="color_secondary">هزینه ارسال</span>
                <span class="shipping_cost">0 تومان</span>
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

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/shop.js') }}" defer></script>

</body>
</html>
