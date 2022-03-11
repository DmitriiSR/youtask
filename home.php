<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

<div class="wrapper">
<header class="header">
        <a href="">Главная</a>
        <time id='date'>2 марта 2022, среда</time>
    </header>
    <?php require_once "components/sidebar.php"?>
    <main class="section__wrapper">
    <div class="section__block">
        <section class="overdue-tasks">
            <div class="overdue-tasks-inner">
            <img src="images/home/overdue-tasks-background.png" alt="">
                <h1>Просроченные задачи</h1>
                <div class="no-tasks">
                    <svg class="icon" style="width:85px; height:85px; margin-bottom: 11px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-smile"></use>
                    </svg>
                    <span>У Вас нет просроченных задач</span>
                </div>
                <a href="" class="btn">Показать ещё</a>
            </div>
        </section>
        <section class="right-sections">
            <section class="my-projects">
                <div class="my-projects-inner">
                    <img src="images/home/my-projects-background.png" alt="">
                    <h1>Мои проекты</h1>
                    <div class="no-tasks">
                        <svg class="icon" style="width:70px; height:70px; margin-bottom: 11px;" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#icon-note"></use>
                        </svg>
                        <span>У Вас пока нет актуальных проектов</span>
                    </div>
                    <a href="" class="btn">Показать ещё</a>
                </div>
            </section>
            <section class="chat">
                <h1>Чат</h1>
                <div class="chat__inner">
                    <a href="">
                        <svg class="icon" style="width:61px; height:61px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#icon-add-blue"></use>
                        </svg>
                    </a>
                    <a href="">
                        <svg class="icon" style="width:61px; height:61px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#chat-yellow"></use>
                        </svg>
                    </a>
                    <a href="">
                        <svg class="icon" style="width:61px; height:61px;" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#chat-orange"></use>
                        </svg>
                    </a>
                </div>
            </section>
        </section>

    </main>
</div>
<script src="js/main.js"></script>
<?php require_once "components/footer.php"?>



