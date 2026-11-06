<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopi | سبد خرید</title>

    <link rel="stylesheet" href="{{ asset('assets/style/shop.css') }}">
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
    <div class="shop_items_box">
        <div class="shop_title">
            <a href="{{ route('home') }}" aria-label="بازگشت به فروشگاه">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <h2>سبد خرید</h2>
        </div>

        {{-- لیست محصولات با ساختار div سازگار با CSS --}}
        <div class="shop_items">
            @forelse($items as $item)
                <div class="selected_item_box">

                    <div class="selected_item_group">

                        <div class="selected_item_img">
                            <img src="{{ asset('assets/images/' . $item->product->image) }}"
                                 alt="{{ $item->product->name }}">
                        </div>

                        <div class="selected_item_info">

                            <div class="selected_item_text">
                                <span>{{ $item->product->name }}</span>
                                <span>{{ number_format($item->unit_price) }} تومان</span>
                            </div>

                            <div class="selected_item_button">

                                {{-- دکمه افزایش --}}
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                    <button type="submit" title="افزایش">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </form>

                                <span>{{ $item->quantity }}</span>

                                {{-- دکمه کاهش --}}
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="quantity" value="{{ max(1, $item->quantity - 1) }}">
                                    <button type="submit" title="کاهش">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                    {{-- دکمه حذف --}}
                    <div class="selected_item_button">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete_item_btn" title="حذف">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="selected_item_box" style="justify-content:center; padding: 20px;">
                    <span>سبد خرید خالی است.</span>
                </div>
            @endforelse
        </div>

        {{-- بخش تخفیف با کلاس‌های موجود در CSS --}}
        <div class="total_items">

            <div class="total_item">
                <span class="color_secondary">جمع کل محصولات</span>
                <span class="cart_subtotal">{{ number_format($cart->subtotal) }} تومان</span>
            </div>

            <div class="discount_items">
                <span class="color_secondary">کد تخفیف</span>
                <div class="discount_input_box">
                    <input
                        type="text"
                        class="discount_input font_vazir"
                        placeholder="کد تخفیف"
                        maxlength="30"
                    >
                    <button type="button" class="discount_btn">اعمال</button>
                </div>
            </div>

            <div class="cost_items">
                <span class="color_secondary">هزینه ارسال</span>
                <span class="shipping_cost">0 تومان</span>
            </div>

        </div>

        <div class="payment">

            <div class="total_payment">
                <span class="text_primary">مبلغ قابل پرداخت</span>
                <span class="text_success cart_total">{{ number_format($cart->total) }} تومان</span>
            </div>

            <a href="{{ route('confirmpayment') }}" class="btn_submit">
                <span>ادامه خرید</span>
            </a>

        </div>

    </div>
</div>

{{-- داده‌های اولیه برای JS --}}
<script>
    window.__SHOP_DATA__ = {
        cart: {
            items: @json($items),
            subtotal: {{ (int) $cart->subtotal }},
            total: {{ (int) $cart->total }}
        }
    };
</script>

<script src="{{ asset('assets/js/archive.js') }}" defer></script>
<script src="{{ asset('assets/js/shop.js') }}?v={{ time() }}" defer></script>

</body>
</html>
