<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopi | سبد خرید</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/style/shop.css') }}">
    <!-- style -->

    <!-- icons -->
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
    <!-- icons -->
</head>

<body class="font_vazir">

<!-- start nav -->
<nav class="nav font_vazir">
    <div class="my_container">
        <div class="nav_items">

            <!-- Logo -->
            <div class="logo">
                <span class="logo_text font_saleh">شاپی</span>
            </div>

            <!-- Hamburger Button -->
            <button class="menu_toggle" aria-label="باز کردن منو" aria-expanded="false">
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>

            <!-- Menu Content -->
            <div class="nav_menu">

                <!-- Search -->
                <div class="search_box">
                    <label class="search">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <input
                            class="search_input font_vazir"
                            type="search"
                            placeholder="جستجوی محصول..."
                            maxlength="100"
                        >
                    </label>
                </div>

                <!-- Navigation Links -->
                <div class="nav_links">

                    <div class="login_box">
                        <a href="login.html" class="login_link">ورود/ثبت نام</a>
                    </div>

                    <div class="favorite_box">
                        <a href="#" aria-label="علاقه‌مندی‌ها">
                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="shop_box">
                        <a href="shop.html" aria-label="سبد خرید">
                            <i class="fa-regular fa-cart-shopping" aria-hidden="true"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end nav -->

<div class="my_container">
    <div class="shop_items_box">

        <div class="shop_title">
            <a href="{{ url('/') }}" aria-label="بازگشت به فروشگاه">
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
            <h2>سبد خرید</h2>
        </div>

        <table class="shop_items">
            <tbody class="cart_items">
            <!-- ردیف‌ها توسط shop.js ساخته می‌شوند -->
            </tbody>
        </table>

        <div class="total_items">

            <div class="total_item">
                <span class="color_secondary">جمع کل محصولات</span>
                <span class="cart_subtotal">0 تومان</span>
            </div>

            <div class="cost_items">
                <span class="color_secondary">هزینه ارسال</span>
                <span class="shipping_cost">0 تومان</span>
            </div>

            <div class="discount_items">
                <span class="color_secondary">کد تخفیف</span>

                <div class="discount_input_box">
                    <input
                        class="discount_input"
                        type="text"
                        maxlength="20"
                        aria-label="کد تخفیف"
                        placeholder="کد تخفیف را وارد کنید"
                    >
                    <button class="discount_btn" type="button">اعمال</button>
                </div>
            </div>

        </div>

        <div class="payment">

            <div class="total_payment">
                <span class="text_primary">مبلغ قابل پرداخت</span>
                <span class="text_success cart_total">0 تومان</span>
            </div>

            <a href="confirmpayment.html" class="btn_submit">
                <span>ادامه خرید</span>
            </a>

        </div>

    </div>
</div>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/shop.js') }}" defer></script>
</body>
</html>
