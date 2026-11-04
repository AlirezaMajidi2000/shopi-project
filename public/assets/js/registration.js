const userNameInput = document.querySelector('#username')
const userEmail = document.querySelector('#email')
const userPassword = document.querySelector('#password')
const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');

// اعتبارسنجی نام کاربری

userNameInput.addEventListener('input' , function(){
  validateInput(userNameInput , usernameRegex)
})

// اعتبارسنجی نام کاربری

// اعتبارسنجی ایمیل

userEmail.addEventListener('input' , function(){
  validateInput(userEmail , emailRegex)
})

// اعتبارسنجی ایمیل

// اعتبارسنجی پسوورد

userPassword.addEventListener('input' , function(){
  validateInput(userPassword , passwordRegex)
})

// اعتبارسنجی پسوورد

// مشاهده و مفی شدن رمز عبور

togglePassword.addEventListener('click', function () {

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        passwordInput.type = 'password';
        togglePassword.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }

});

// مشاهده و مخفی شدن رمز عبور