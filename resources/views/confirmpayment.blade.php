<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نهایی کردن خرید | shopi</title>

    <!-- style -->
    <link rel="stylesheet" href="assets/style/confirmpayment.css">
    <!-- style -->

    <!-- icons -->
    <link rel="stylesheet" href="assets/icon/FontAwesome.Pro.6.5.2/css/all.css">
    <!-- icons -->

</head>

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
                        <a href="">
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

<body class="font_vazir">
    
    <div class="my_container">
        <div class="form_box">
            <div class="form_title">
                <span>اطلاعات ارسال</span>
            </div>
            <form action="">
                <div class="input_box">
                    <label for="">نام و نام خانوادگی</label>
                    <input class="input_name" type="text" max="50" class="font_vazir">
                    <small></small>
                </div>
                <div class="input_box">
                    <label for="">شماره تماس</label>
                    <input class="input_phone" type="text" min="11" max="11" class="font_vazir">
                    <small></small>
                </div>
                <div class="input_box">
                    <label for="">آدرس کامل</label>
                    <input class="input_address" type="text" class="font_vazir">
                    <small></small>
                </div>
                <!-- انتخاب استان و شهرستان -->
                <div class="province_box">
                    <label for="province">استان</label>
                    <select name="" id="province" class="province_select font_vazir">
                        <option value="">--انتخاب استان--</option>
                    </select>
                </div>
                <div class="city_box">
                    <label for="province">شهرستان</label>
                    <select name="" id="city" class="city_select font_vazir">
                        <option value="">--انتخاب شهرستان--</option>
                    </select>
                </div>
                <!-- انتخاب استان و شهرستان -->
            </form>
            <div class="form_btn_box">
                <a href="modal.html" class="form_btn">تایید و پرداخت</a>
            </div>
        </div>

    </div>

    <script src="assets/js/archive.js"></script>
    <script src="assets/js/confirmpayment.js"></script>

</body>
</html>