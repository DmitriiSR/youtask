<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/auth-form.css">
</head>
<body>
<div class="auth">
    <div class="auth__container">
        <div class="auth__logo"></div>
        <nav class="auth__menu">
            <a href="#" class="auth__link active">Sign in</a>
            <a href="#" class="auth__link">Sign up</a>
        </nav>
        <div class="auth__body active">
            <form class="auth__form" action="" method="post" name="sign-in-form" id="signIn">
                <label for="username" class="auth__label">
                    <span>e-mail</span>
                    <input type="email" name="username" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Password</span>
                    <input type="password" name="password" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <label for="checkbox" class="auth__checkbox">
                    <input type="checkbox" id="checkbox" class="auth__checkbox-input">
                    <span class="auth__checkbox-span">Continue without authorization</span>
                </label>
                <span class="auth__error">Неверное имя пользователя или пароль</span>
                <input type="submit" name="signInBtn" value="Sign In" class="auth__btn">
            </form>
            <a href="#" class="auth__forgot">Forgot your password?</a>
        </div>
        <div class="auth__body">
            <form class="auth__form" action="" method="post" name="sign-up-form" id="signUp" style="padding-bottom: 0; border-bottom: none;">
                <label for="username" class="auth__label">
                    <span>Yur name</span>
                    <input class="" type="text" name="fullname" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="username" class="auth__label">
                    <span>e-mail</span>
                    <input type="email" name="username" placeholder="">
                    <span class="auth__error"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Create password</span>
                    <input class="" type="password" name="passwordreg" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <label for="password" class="auth__label">
                    <span>Confirm password</span>
                    <input class="" type="password" name="confirmpassword" placeholder="">
                    <span class="auth__error"></span>
                    <span class="auth__eye"></span>
                </label>
                <input type="submit" name="signUpBtn" value="Sign Up" class="auth__btn">
            </form>
        </div>
    </div>
</div>
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

                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1")
                    {
                        alert('Вы успешно зарегистрировались!');
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
</script>
</body>
</html>