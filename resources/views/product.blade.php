<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | shopi</title>

    <link rel="stylesheet" href="{{ asset('assets/style/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/FontAwesome.Pro.6.5.2/css/all.css') }}">
</head>

<body class="font_vazir">

<div class="card" id="productDetail">
    <h1>{{ $product->name }}</h1>

    @if($product->image)
        <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
    @endif

    <p>{{ $product->description }}</p>

    <p>
        قیمت:
        @if($product->discount_price)
            <del>{{ number_format($product->price) }} تومان</del>
            <strong>{{ number_format($product->discount_price) }} تومان</strong>
        @else
            <strong>{{ number_format($product->price) }} تومان</strong>
        @endif
    </p>

    <p>موجودی: {{ $product->stock }} عدد</p>
    <div class="product_btn">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="product_add_btn">افزودن به سبد خرید</button>
        </form>
    </div>

</div>


<a href="{{ route('home') }}" class="back">
    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
    بازگشت به محصولات
</a>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/product.js') }}" defer></script>
</body>
</html>
