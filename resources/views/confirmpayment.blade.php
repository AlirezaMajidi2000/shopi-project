<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نهایی کردن خرید | shopi</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/style/confirmpayment.css') }}">
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
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Menu Content -->
            <div class="nav_menu">

                <!-- Search -->
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

                <!-- Navigation Links -->
                <div class="nav_links">

                    <div class="login_box">
                        <a href="login.html" class="login_link">ورود/ثبت نام</a>
                    </div>

                    <div class="favorite_box">
                        <a href="#">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                    </div>

                    <div class="shop_box">
                        <a href="shop.html">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end nav -->

<div class="my_container">
    <div class="form_box">
        <div class="form_title">
            <span>اطلاعات ارسال</span>
        </div>

        <form action="#" method="POST">
            <div class="input_box">
                <label for="fullname">نام و نام خانوادگی</label>
                <input id="fullname" class="input_name font_vazir" type="text" maxlength="50">
                <small></small>
            </div>

            <div class="input_box">
                <label for="phone">شماره تماس</label>
                <input id="phone" class="input_phone font_vazir" type="tel" maxlength="11" pattern="09[0-9]{9}">
                <small></small>
            </div>

            <div class="input_box">
                <label for="address">آدرس کامل</label>
                <input id="address" class="input_address font_vazir" type="text">
                <small></small>
            </div>

            <!-- انتخاب استان و شهرستان -->
            <div class="province_box">
                <label for="province">استان</label>
                <select name="province" id="province" class="province_select font_vazir">
                    <option value="">--انتخاب استان--</option>
                </select>
            </div>

            <div class="city_box">
                <label for="city">شهرستان</label>
                <select name="city" id="city" class="city_select font_vazir">
                    <option value="">--انتخاب شهرستان--</option>
                </select>
            </div>
            <!-- انتخاب استان و شهرستان -->

            <div class="form_btn_box">
                <button type="submit" class="form_btn">تایید و پرداخت</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/archive.js') }}"></script>
<script src="{{ asset('assets/js/confirmpayment.js') }}"></script>

</body>
</html>
