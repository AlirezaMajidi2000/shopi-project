let loginForm = document.getElementById("loginForm");
let emailInput = document.getElementById("email");
let passwordInput = document.getElementById("password");

let emailMsg = document.querySelector(".email_msg");
let passwordMsg = document.querySelector(".password_msg");

let togglePassword = document.getElementById("togglePassword");

let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
// let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/;


// نمایش یا مخفی کردن رمز عبور
if (togglePassword) {
    togglePassword.addEventListener("click", function () {
        let isPassword = passwordInput.type === "password";

        passwordInput.type = isPassword ? "text" : "password";

        this.innerHTML = isPassword
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';

        this.setAttribute(
            "aria-label",
            isPassword ? "مخفی کردن رمز عبور" : "نمایش رمز عبور"
        );
    });
}


// نمایش خطای یک فیلد
function showFieldError(element, message) {
    if (!element) return;
    element.textContent = message;
    element.classList.remove("d-none", "text-green");
    element.classList.add("d-block", "text-red");
}


// نمایش موفقیت یک فیلد
function showFieldSuccess(element) {
    if (!element) return;
    element.textContent = "موفق: ورودی مجاز است.";
    element.classList.remove("d-none", "text-red");
    element.classList.add("d-block", "text-green");
}


// پاک کردن پیام یک فیلد
function clearFieldError(element) {
    if (!element) return;
    element.textContent = "";
    element.classList.add("d-none");
    element.classList.remove("d-block", "text-red", "text-green");
}


// اعتبارسنجی ایمیل
function validateEmail() {
    let email = emailInput.value.trim();

    if (email === "") {
        showFieldError(emailMsg, "ایمیل را وارد کنید.");
        return false;
    }

    if (!emailRegex.test(email)) {
        showFieldError(emailMsg, "ایمیل نامعتبر است.");
        return false;
    }

    showFieldSuccess(emailMsg);
    return true;
}


// اعتبارسنجی رمز عبور
function validatePassword() {
    let password = passwordInput.value;

    if (password.trim() === "") {
        showFieldError(passwordMsg, "رمز عبور را وارد کنید.");
        return false;
    }

    if (!passwordRegex.test(password)) {
        showFieldError(
            passwordMsg,
            "رمز عبور باید حداقل ۸ کاراکتر و شامل حرف کوچک، حرف بزرگ، عدد و کاراکتر خاص باشد."
        );
        return false;
    }

    showFieldSuccess(passwordMsg);
    return true;
}


// اعتبارسنجی هنگام تایپ ایمیل
if (emailInput) {
    emailInput.addEventListener("input", validateEmail);
}

// اعتبارسنجی هنگام تایپ رمز عبور
if (passwordInput) {
    passwordInput.addEventListener("input", validatePassword);
}


// اعتبارسنجی هنگام ارسال فرم (فقط برای جلوگیری از ارسال نامعتبر)
if (loginForm) {
    loginForm.addEventListener("submit", function (event) {
        let isEmailValid = validateEmail();
        let isPasswordValid = validatePassword();

        if (!isEmailValid || !isPasswordValid) {
            event.preventDefault();  // فقط اگه نامعتبر بود، جلوگیری کن
        }
    });
}
