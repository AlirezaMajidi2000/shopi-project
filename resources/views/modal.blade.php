<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خرید موفقیت آمیز | shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
</head>
<body class="font_vazir">
<div class="my_container">
    <div class="modal_box">
        <div class="check">
            <div class="check_box">
                <i class="fa-solid fa-check" aria-hidden="true"></i>
            </div>
        </div>
        <div class="modal_text">
            <h2>خرید شما با موفقیت ثبت شد!</h2>
            <p>
                سفارش شما با شماره <strong>#{{ $payment->order_number }}</strong> ثبت شد.
                جزئیات سفارش به شماره شما توسط پیامک ارسال شد.
            </p>
        </div>
        <div class="modal_btn_box">
            <div class="modal_btn">
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-home" aria-hidden="true"></i>
                    <span>بازگشت به فروشگاه</span>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
