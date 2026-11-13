<div class="shop_items" id= "cartContainer">
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

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="value_increment" style="display:inline;"
                              data-error-message="خطا در افزایش محصول">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                            <button type="submit" title="افزایش">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </form>

                        <span>{{ $item->quantity }}</span>

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="value_decrement" style="display:inline;">
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

            <div class="selected_item_button">
                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="cart_remove" style="display:inline;">
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
