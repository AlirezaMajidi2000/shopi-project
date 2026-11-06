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

                    @auth
                        {{-- کاربر لاگین کرده: نام کاربر + دکمه خروج --}}
                        <div class="login_box">
                            <span class="login_link">{{ auth()->user()->name ?? auth()->user()->username }}</span>
                        </div>

                        <div class="logout_box">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="logout_btn" title="خروج از حساب">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="font_vazir">خروج</span>
                                </button>
                            </form>
                        </div>
                    @else
                        {{-- کاربر مهمان: لینک ورود/ثبت نام --}}
                        <div class="login_box">
                            <a href="{{ route('login') }}" class="login_link">ورود/ثبت نام</a>
                        </div>
                    @endauth

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
                <a href="{{ route('home') }}">
                    مشاهده همه
                    <i class="fa-solid fa-angle-left"></i>
                </a>
            </div>

            <div class="products_items">
                @forelse($products as $product)
                    <div class="box">
                        <div class="product_item">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product_img">
                                    <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
                                </div>

                                <div class="product_text">
                                    <span class="font_vazir">{{ $product->name }}</span>
                                    <span class="font_vazir">{{ number_format($product->final_price) }} تومان</span>
                                </div>
                            </a>
                        </div>

                        <div class="product_btn">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="product_add_btn">افزودن به سبد خرید</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>محصولی یافت نشد.</p>
                @endforelse
            </div>

        </div>
    </div>
</section>
<!-- end products -->

{{-- پیام‌های موفقیت/خطا --}}
@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 1rem; margin: 1rem; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 1rem; margin: 1rem; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>

</body>
</html>
