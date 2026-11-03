<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
</head>

<body class="font_vazir">

<!-- start nav -->

<nav class="nav font_vazir">
    <div class="my_container">

        <div class="nav_items">

            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <span class="logo_text font_saleh">شاپی</span>
                </a>
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

<!-- end nav -->

<!-- start header -->
<header>
    <div class="next" onclick="plusSlides(1)">
        <i class="fa-solid fa-angle-right"></i>
    </div>

    <div class="prev" onclick="plusSlides(-1)">
        <i class="fa-solid fa-angle-left"></i>
    </div>
</header>
<!-- end header -->

<!-- start categorise -->
<section class="categorise">
    <div class="my_container">
        <div class="categorise_box">

            <button class="categorise_item" data-category="phone">
                <i class="fa-regular fa-mobile"></i>
                <span class="font_vazir">موبایل</span>
            </button>

            <button class="categorise_item" data-category="laptop">
                <i class="fa-regular fa-laptop"></i>
                <span class="font_vazir">لپ تاپ</span>
            </button>

            <button class="categorise_item" data-category="earpod">
                <i class="fa-regular fa-headphones"></i>
                <span class="font_vazir">هدفون</span>
            </button>

            <button class="categorise_item" data-category="watch">
                <i class="fa-regular fa-watch"></i>
                <span class="font_vazir">ساعت هوشمند</span>
            </button>

        </div>
    </div>
</section>
<!-- end categorise -->

<!-- start products -->
<section class="products">
    <div class="my_container">
        <div class="products_box">

            <div class="products_title">
                <h2>پیشنهادهای ویژه</h2>
                <a href="{{ route('shop') }}">
                    مشاهده همه
                    <i class="fa-solid fa-angle-left"></i>
                </a>
            </div>

            <div class="products_items"></div>

        </div>
    </div>
</section>
<!-- end products -->

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>

</body>
</html>
