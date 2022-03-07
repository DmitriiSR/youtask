<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/auth-form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="auth">
    <div class="auth__container">
        <div class="auth__logo"></div>
        <nav class="auth__menu">
            <a href="#" class="auth__link active">Вход</a>
            <a href="#" class="auth__link">Регистрация</a>
        </nav>
        <div class="auth__body active">
            <form class="auth__form" action="" method="post" name="sign-in-form" id="signIn">
                <label for="username" class="auth__label">
                    <span>E-mail</span>
                    <input type="email" name="username" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Пароль</span>
                    <input type="password" name="password" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <a href="#" class="auth__forgot">Забыли пароль?</a>
                <label for="checkbox" class="auth__checkbox">
                    <input type="checkbox" id="checkbox" class="auth__checkbox-input">
                    <span class="auth__checkbox-span">Запомнить меня</span>
                </label>
                <span class="auth__error">Неверное имя пользователя или пароль</span>
                <input type="submit" name="signInBtn" value="Войти" class="auth__btn">
            </form>
        </div>
        <div class="auth__body">
            <form class="auth__form" action="" method="post" name="sign-up-form" id="signUp" style="padding-bottom: 0; border-bottom: none;">
                <label for="username" class="auth__label">
                    <span>Имя*</span>
                    <input class="" type="text" name="fullname" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="username" class="auth__label">
                    <span>E-mail*</span>
                    <input type="email" name="username" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Придумайте пароль</span>
                    <input class="" type="password" name="passwordreg" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Подтвердите пароль</span>
                    <input class="" type="password" name="confirmpassword" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <input type="submit" name="signUpBtn" value="Регистрация" class="auth__btn">
            </form>
        </div>
    </div>
</div>
<script>
    console.log(document.cookie);
</script>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src="js/auth.js"></script>
<script>

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

</script>

<script>

</script>
</body>
</html>