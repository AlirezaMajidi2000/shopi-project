
let discountInput = document.querySelector('.discount_input');
let cartItems = document.querySelector('.cart_items');
let cartSubtotal = document.querySelector('.cart_subtotal');
let shippingCost = document.querySelector('.shipping_cost');
let cartTotalElement = document.querySelector('.cart_total');
let discountBtn = document.querySelector('.discount_btn');

// اعتبارسنجی کد تخفیف

discountInput.addEventListener('input', function () {
    validateInput(discountInput, discountRegex);
});


// سبد خرید

let cart = {
    items: [],
    total: 0
};


// تبدیل قیمت رشته ای به عدد

function getPrice(price) {
    return Number(String(price).replaceAll('/', ''));
}


// نمایش قیمت

function formatPrice(price) {
    return price.toLocaleString('en-US').replaceAll(',', '/') + ' تومان';
}


// نمایش محصولات سبد خرید

const renderCartItems = function () {

    cartItems.innerHTML = '';

    if (cart.items.length === 0) {

        cartItems.innerHTML = `
            <tr>
                <td>محصولی در سبد خرید وجود ندارد</td>
            </tr>
        `;

        updateCartTotal();

        return;
    }

    cart.items.forEach(function (item) {

        cartItems.innerHTML += `
        <tr>
            <th>
                <div class="selected_item_box">

                    <div class="selected_item_group">

                        <div class="selected_item_img">
                            <img src="${item.image}" alt="${item.title}">
                        </div>

                        <div class="selected_item_info">

                            <div class="selected_item_text">
                                <span>${item.title}</span>
                                <span>${formatPrice(item.price)}</span>
                            </div>

                            <div class="selected_item_button">

                                <button type="button"
                                    data-action="increase"
                                    data-id="${item.id}">
                                    <i class="fa-solid fa-plus"></i>
                                </button>

                                <span>${item.qty}</span>

                                <button type="button"
                                    data-action="decrease"
                                    data-id="${item.id}">
                                    <i class="fa-solid fa-minus"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                    <div class="selected_item_button">

                        <button type="button"
                            class="delete_item_btn"
                            data-action="delete"
                            data-id="${item.id}">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>

                    </div>

                </div>
            </th>
        </tr>
        `;

    });

    updateCartTotal();

};


// افزودن محصول به سبد خرید

const addToCart = (productIndex) => {

    const product = products[productIndex];

    if (!product) return;

    let existingProduct = false;

    let newCartItems = cart.items.reduce((state, item) => {

        if (item.id === product.id) {

            existingProduct = true;

            const newItem = {
                ...item,
                qty: item.qty + 1,
                total: (item.qty + 1) * getPrice(item.price)
            };

            return [...state, newItem];

        }

        return [...state, item];

    }, []);


    if (!existingProduct) {

        newCartItems.push({
            ...product,
            price: getPrice(product.price),
            qty: 1,
            total: getPrice(product.price)
        });

    }


    cart = {
        ...cart,
        items: newCartItems
    };

    renderCartItems();

};


// مدیریت تعداد و حذف محصولات

cartItems.addEventListener('click', function (event) {

    const button = event.target.closest('button');

    if (!button) return;

    const action = button.dataset.action;

    const id = Number(button.dataset.id);

    const product = cart.items.find(item => item.id === id);

    if (!product) return;


    if (action === 'increase') {

        product.qty++;

    }

    else if (action === 'decrease') {

        if (product.qty > 1) {
            product.qty--;
        }

    }

    else if (action === 'delete') {

        cart.items = cart.items.filter(item => item.id !== id);

    }


    // محاسبه مجدد قیمت محصول

    cart.items.forEach(function (item) {

        item.total = item.qty * item.price;

    });

    renderCartItems();

});


// محاسبه جمع کل و مبلغ نهایی

let discountPercent = 0;

const shippingPrice = 50000;

function updateCartTotal() {

    let subtotal = 0;

    cart.items.forEach(function (item) {

        subtotal += item.total;

    });

    const discountAmount = subtotal * discountPercent / 100;

    const shipping = cart.items.length > 0 ? shippingPrice : 0;

    const finalPrice = subtotal - discountAmount + shipping;

    cart.total = finalPrice;

    cartSubtotal.textContent = formatPrice(subtotal);

    shippingCost.textContent = formatPrice(shipping);

    cartTotalElement.textContent = formatPrice(finalPrice);

}


// کدهای تخفیف

const discountCodes = {
    SHOPI10: 10,
    SHOPI20: 20,
    SHOPI30: 30
};


// اعمال کد تخفیف

discountBtn.addEventListener('click', function () {

    const code = discountInput.value.trim().toUpperCase();

    if (cart.items.length === 0) {

        alert('سبد خرید شما خالی است');

        return;

    }

    if (discountCodes[code] !== undefined) {

        discountPercent = discountCodes[code];

        alert(`تخفیف ${discountPercent} درصدی اعمال شد`);

    } else {

        discountPercent = 0;

        alert('کد تخفیف معتبر نیست');

    }

    updateCartTotal();

});


// اتصال دکمه های افزودن محصول

document.addEventListener('click', function (event) {

    const button = event.target.closest('.product_add_btn');

    if (!button) return;

    const productId = Number(button.dataset.id);

    const product = products.find(item => item.id === productId);

    if (!product) return;

    addToCart(products.indexOf(product));

});


// اجرای اولیه

renderCartItems();
