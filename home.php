<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>
<body>
<div class="wrapper">
    <aside class="menu">
        <svg class="icon" style="width: 174px; height: 57px; margin-bottom: 98px; padding-left: 38px;" aria-hidden="true" focusable="false">
            <use href="images/sprite.svg#logo-blue-transparent"></use>
        </svg>
        <nav class="menu__navigation">
        <ul class="menu__list">
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-home"></use>
                    </svg>
                    <span>Главная</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-task"></use>
                    </svg>
                    <span>Мои задачи</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-projects"></use>
                    </svg>
                    <span>Проекты</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-team"></use>
                    </svg>
                    <span>Команда</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-notifications"></use>
                    </svg>
                    <span>Уведомления</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-message"></use>
                    </svg>
                    <span>Чат</span> 
                </a>
            </li>
        </ul>
        </nav>
        <div class="menu__active-user">
            <a href="">
            <svg class="icon" style="width:27px; height: 27px;" aria-hidden="true" focusable="false">
                    <use href="images/sprite.svg#user-blue"></use>
                </svg>
                <span><?php echo $_COOKIE["username"]?></span>
            </a>
        </div>
    </aside>
    <main class="section__wrapper">
    <header class="header">
        <a href="">Главная</a>
        <time id='date'>2 марта 2022, среда</time>
    </header>
    <div class="section__block">
        <section class="overdue-tasks">
            <div class="overdue-tasks-inner">
                <img src="images/home/overdue-tasks-background.png" alt="">
            </div>
        </section>
        <section class="right-sections">
            <section class="my-projects">
                <div class="my-projects-inner">
                    <img src="images/home/my-projects-background.png" alt="">
                </div>
            </section>
            <section class="chat"></section>
        </section>

    </main>
</div>
<script src="js/home.js"></script>
</body>
</html>



