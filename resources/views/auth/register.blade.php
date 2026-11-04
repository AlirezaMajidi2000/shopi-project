<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام | Shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/registration.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
</head>

<body class="font_vazir">

<main class="register_page">

    <div class="register_container">

        <!-- Logo -->
        <div class="register_logo">
            <a href="{{ route('home') }}" class="font_saleh">شاپی</a>
            <p>به خانواده شاپی خوش آمدید!</p>
        </div>

        <!-- Register Form -->
        <div class="register_box">

            <div class="register_header">
                <h1>ساخت حساب کاربری</h1>
                <p>برای شروع خرید، اطلاعات زیر را وارد کنید.</p>
            </div>

            {{-- نمایش خطاها --}}
            @if($errors->any())
                <div class="alert alert-danger" style="color: red; margin-bottom: 1rem;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="register_form" action="{{ route('register.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="form_group">
                    <label for="username">نام کاربری</label>
                    <div class="input_box">
                        <i class="fa-regular fa-user"></i>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="نام کاربری خود را وارد کنید"
                            required
                            minlength="3"
                        >
                    </div>
                </div>

                <!-- Email -->
                <div class="form_group">
                    <label for="email">ایمیل</label>

                    <div class="input_box">
                        <i class="fa-regular fa-envelope"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="example@gmail.com"
                            required
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="form_group">
                    <label for="password">رمز عبور</label>

                    <div class="input_box">
                        <i class="fa-regular fa-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="رمز عبور"
                            required
                            minlength="8"
                        >

                        <button type="button" class="toggle_password" id="togglePassword">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Confirmation -->
                <div class="form_group">
                    <label for="password_confirmation">تکرار رمز عبور</label>

                    <div class="input_box">
                        <i class="fa-regular fa-lock"></i>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="تکرار رمز عبور"
                            required
                        >
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="register_btn">
                    ایجاد حساب کاربری
                    <i class="fa-solid fa-arrow-left"></i>
                </button>

            </form>

            <!-- Login Link -->
            <div class="login_text">
                قبلاً ثبت نام کرده‌اید؟
                <a href="{{ route('login') }}">وارد شوید</a>
            </div>

        </div>

        <a href="{{ route('home') }}" class="back_home">
            <i class="fa-solid fa-arrow-right"></i>
            بازگشت به فروشگاه
        </a>

    </div>

</main>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/registration.js') }}" defer></script>

</body>
</html>
