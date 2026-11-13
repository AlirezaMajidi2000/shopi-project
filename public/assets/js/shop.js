
document.addEventListener('submit', function (e) {
    const form = e.target;
    const ajaxClasses = ['value_increment', 'value_decrement', 'cart_remove' , 'add-to-cart-form'];
    if (!ajaxClasses.some(cls => form.classList.contains(cls))) return;

    e.preventDefault();

    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');

    submitBtn.disabled = true;
    const originalText = submitBtn.textContent;
    submitBtn.textContent = '...';

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
    })
        .then(res => {
            if (!res.ok) throw new Error('خطا در سرور');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                alert(data.message);

                const cartCountEl = document.getElementById('cartCount');
                if (cartCountEl && data.cart_count !== undefined) {
                    cartCountEl.textContent = data.cart_count;
                }
                const cartContainer = document.getElementById('cartContainer');
                if (cartContainer && data.html) {
                    cartContainer.innerHTML = data.html;
                }
            }
        })
        .catch(err => {
            alert(form.dataset.errorMessage || 'خطا');
            console.error(err);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
});
