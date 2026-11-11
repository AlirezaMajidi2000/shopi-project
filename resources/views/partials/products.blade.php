
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
