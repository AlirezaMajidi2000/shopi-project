<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات محصول | shopi</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/style/product.css') }}">
    <!-- style -->

    <!-- icon -->
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
    <!-- icon -->
</head>

<body class="font_vazir">

<div class="card" id="productDetail">
    <!-- محتوای محصول توسط product.js پر می‌شود -->
</div>

<a href="{{ url('/') }}" class="back">
    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
    بازگشت به محصولات
</a>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/product.js') }}" defer></script>
</body>
</html>
