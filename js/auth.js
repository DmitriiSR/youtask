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
