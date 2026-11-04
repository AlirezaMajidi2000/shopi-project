<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نهایی کردن خرید | shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/confirmpayment.css') }}">
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
    <div class="form_box">
        <div class="form_title">
            <span>اطلاعات ارسال</span>
        </div>

        {{-- نمایش خطاها --}}
        @if($errors->any())
            <div style="color: red; margin-bottom: 1rem;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payment.store') }}" method="POST">
            @csrf

            <div class="input_box">
                <label for="receiver_name">نام و نام خانوادگی</label>
                <input
                    id="receiver_name"
                    name="receiver_name"
                    class="input_name font_vazir"
                    type="text"
                    value="{{ old('receiver_name') }}"
                    maxlength="50"
                    required
                >
                <small></small>
            </div>

            <div class="input_box">
                <label for="receiver_phone">شماره تماس</label>
                <input
                    id="receiver_phone"
                    name="receiver_phone"
                    class="input_phone font_vazir"
                    type="tel"
                    value="{{ old('receiver_phone') }}"
                    maxlength="11"
                    pattern="09[0-9]{9}"
                    required
                >
                <small></small>
            </div>

            <div class="input_box">
                <label for="shipping_address">آدرس کامل</label>
                <input
                    id="shipping_address"
                    name="shipping_address"
                    class="input_address font_vazir"
                    type="text"
                    value="{{ old('shipping_address') }}"
                    required
                >
                <small></small>
            </div>

            <div class="province_box">
                <label for="province">استان</label>
                <select name="province" id="province" class="province_select font_vazir" required>
                    <option value="">--انتخاب استان--</option>
                </select>
            </div>

            <div class="city_box">
                <label for="city">شهرستان</label>
                <select name="city" id="city" class="city_select font_vazir" required>
                    <option value="">--انتخاب شهرستان--</option>
                </select>
            </div>

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
