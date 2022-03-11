
// Переключение между окнами Войти/Зарегистрироваться

const switchBtnList = document.querySelectorAll('.auth__link');
const formsList = document.querySelectorAll('.auth__body');

let toggleFormClass = function () {

    if (!this.classList.contains('active')) {
        switchBtnList.forEach((item) => item.classList.remove('active'));
        formsList.forEach(function (item) {
            !item.classList.contains('active') ? item.classList.add('active') : item.classList.remove('active');
        });
        this.classList.add('active');
    }
}

switchBtnList.forEach(function (item) {
    item.addEventListener("click", toggleFormClass);
})



// Маска пароля

const eyeBtnList = document.querySelectorAll('.auth__eye');

let toggleInputAttr = function () {
    this.classList.toggle('active');
    this.parentElement.querySelector('input').type === 'password' ? this.parentElement.querySelector('input').type = 'text' : this.parentElement.querySelector('input').type = 'password';
}

eyeBtnList.forEach(function (item) {
    item.addEventListener("click", toggleInputAttr)
})

// Валидация

const signUpForm = document.forms['sign-up-form'];
const signInForm = document.forms['sign-in-form'];
const mailInput = signUpForm.querySelector('input[name=username]');
const usernameInput = signUpForm.querySelector('input[name=fullname]');
const passwordInput = signUpForm.querySelector('input[name=passwordreg]');
const confirmPasswordInput = signUpForm.querySelector('input[name=confirmpassword]');
const mailInputSignIn = signInForm.querySelector('input[name=username]');


// let username = mailInput.value;
//
let validationFunc = function () {
    let inputLabel = this.parentNode;
    let errorMessage = inputLabel.querySelector('.auth__error');

    if (this.type === 'email' || this.type === 'text') {
        if (this.value === '') {
            inputLabel.classList.add('is-error');
            errorMessage.innerHTML = 'Поле не должно быть пустым!'
        } else if ( this.type === 'email' && validateEmail(this.value) === false) {
            inputLabel.classList.add('is-error');
            errorMessage.innerHTML = 'Неверно введен адрес почты!'
        }
    } else if (this.name === 'passwordreg') {
        if (this.value === '' || this.value.length < 8) {
            inputLabel.classList.add('is-error');
            errorMessage.innerHTML = 'Пароль должен содержать не менее 8 символов!'
        }
    } else if (this.name === 'confirmpassword') {
        if (this.value !== passwordInput.value) {
            inputLabel.classList.add('is-error');
            errorMessage.innerHTML = 'Пароли не совпадают!'
        }
    }

    this.onfocus = () => inputLabel.classList.remove('is-error');
}

function validateEmail (emailStr) {
    return /@[^.]+\.\w/.test(emailStr);
}

mailInput.addEventListener("blur", validationFunc);
usernameInput.addEventListener("blur", validationFunc);
passwordInput.addEventListener("blur", validationFunc);
confirmPasswordInput.addEventListener("blur", validationFunc);
mailInputSignIn.addEventListener("blur", validationFunc);

// Запрос на авторизацию
$(document).ready(function() {
    $('#signIn').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '/engine/sign-in.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    document.cookie = "auth_user=true; path=http://youtask/";
                    document.cookie = "username=" + jsonData.username + "; path=http://youtask/";
                    document.cookie = "userid=" + jsonData.userid + "; path=http://youtask/";
                    location.href = 'index.php';
                }
                else
                {
                    signInForm.classList.add('error');
                }
            }
        });
    });
});

// Это запрос на регистрацию

$(document).ready(function() {
    $('#signUp').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/engine/sign-up.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1")
                {
                    document.cookie = "auth_user=true; path=http://youtask/";
                    document.cookie = "username=" + jsonData.username + "; path=http://youtask/";
                    document.cookie = "userid=" + jsonData.userid + "; path=http://youtask/";
                    location.href = 'index.php';
                }
                else if (jsonData.error == "1")
                {
                    alert('Такой пользователь уже существует! Введите другой e-mail.');
                } else {
                    alert('Зарегестрироваться не удалось.');
                }
            }
        });
    });
});
