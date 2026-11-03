let searchInput = document.querySelector('.search_input');
let productsItems = document.querySelector('.products_items');
let categoryBtn = document.querySelectorAll('.categorise_item');

// اعتبارسنجی سرچ

searchInput.addEventListener('input', function () {
    validateInput(searchInput, searchRegex);
});

// تابع رندر کردن محصولات

function renderProducts(productsList = products) {

    productsItems.innerHTML = '';

    productsList.forEach(function (product) {

        productsItems.innerHTML += `
            <div class="box">
                <div class="product_item" onclick="goToProduct('${product.slug}')">
                    <div class="product_img">
                        <img src="${product.image}" alt="${product.title}">
                    </div>

                    <div class="product_text">
                        <span class="font_vazir">${product.title}</span>
                        <span class="font_vazir">${product.price} تومان</span>
                    </div>
                </div>

                <div class="product_btn">
                    <button class="product_add_btn" data-id="${product.id}">
                        افزودن به سبد خرید
                    </button>
                </div>
            </div>
        `;
    });
}

renderProducts();

// فیلتر کردن محصولات

categoryBtn.forEach(function (button) {

    button.addEventListener('click', function () {

        let category = button.dataset.category;

        let filterProducts = products.filter(function (product) {
            return product.category === category;
        });

        renderProducts(filterProducts);

    });

});

// slider

let images = [
    'assets/images/slider1.jpg',
    'assets/images/slider2.jpg',
    'assets/images/slider3.jpg'
];

let header = document.querySelector('header');
let slideIndex = 0;

function showSlides() {

    header.style.opacity = '0';

    setTimeout(function () {

        header.style.backgroundImage = `url("${images[slideIndex]}")`;

        header.style.opacity = '1';

    }, 500);
}

function plusSlides(n) {

    slideIndex = slideIndex + n;

    if (slideIndex >= images.length) {
        slideIndex = 0;
    }

    if (slideIndex < 0) {
        slideIndex = images.length - 1;
    }

    showSlides();
}

// نمایش اسلاید اول

showSlides();

// رفتن به صفحه محصول

function goToProduct(slug) {
    location.href = `product.html?slug=${slug}`;
}
