<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ورود به حساب کاربری | Shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.jpg') }}"/>
</head>

<body class="font_vazir">

<main class="login_page">

    <section class="login_card">

        <header class="login_header">
            <div class="login_logo"></div>
            <h1 class="login_title">فروشگاه شاپی</h1>
            <p class="login_subtitle">
                برای ورود به حساب کاربری خود اطلاعات زیر را وارد کنید.
            </p>
        </header>

        {{-- نمایش خطاها --}}
        @if($errors->any())
            <div class="login_message error" style="display:block; color:red; margin-bottom:1rem;">
                <ul style="margin:0; padding:0; list-style:none;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- نمایش پیام موفقیت --}}
        @if(session('success'))
            <div class="login_message success" style="display:block; color:green; margin-bottom:1rem;">
                {{ session('success') }}
            </div>
        @endif

        <form class="login_form" id="loginForm" action="{{ route('login.store') }}" method="POST" novalidate>
            @csrf

            <div class="login_group">
                <label for="email">ایمیل</label>

                <div class="login_input_box">
                    <i class="fa-regular fa-user"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="ایمیل خود را وارد کنید"
                        autocomplete="email"
                        required
                    >
                </div>

                <small class="email_msg d-none"></small>
            </div>

            <div class="login_group">
                <label for="password">رمز عبور</label>

                <div class="login_input_box">
                    <i class="fa-regular fa-lock"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="رمز عبور خود را وارد کنید"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle_password"
                        id="togglePassword"
                        aria-label="نمایش رمز عبور"
                    >
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>

                <small class="password_msg d-none"></small>
            </div>

            <div class="login_message d-none" id="loginMessage" role="alert"></div>

            <button type="submit" class="login_button">
                <span>ورود به حساب</span>
                <i class="fa-solid fa-arrow-left"></i>
            </button>

            <p style="text-align: center; margin-top: 1rem;">
                حساب ندارید؟ <a href="{{ route('register') }}">ثبت‌نام</a>
            </p>

        </form>

        <footer class="login_footer">
            <span>فروشگاه</span>
            <span class="footer_dot"></span>
            <span>شاپی</span>
        </footer>

    </section>

    <p class="copyright">
        © تمامی حقوق متعلق به شاپی است.
    </p>

</main>

<script src="{{ asset('assets/js/login.js') }}" defer></script>

</body>
</html>
