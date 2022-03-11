<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>
<body>
<div class="mytasks__wrapper">
<header class="header">
        <a href="">Мои задачи</a>
        <time id='date'>2 марта 2022, среда</time>
    </header>
    <?php require_once "components/sidebar.php"?>
    <main class="section__wrapper">
    <section class="tasks">
        <img src="images/mytasks/mytasks-block-background.png" alt="">
        <div class="tasks__inner">
            <header class="tasks__header">
                <span>Задачи</span>
                <span>Все задачи</span>
            </header>
                <button data-bind="click: function () { viewModel.popupVisible(!viewModel.popupVisible()) }">view</button>
                <div data-bind="visible: viewModel.popupVisible" class="" style="width: 300px; height: 100px; background-color: #ccc;"></div>

             <!-- ko foreach: viewModel.tasksArr -->
                   <div class="">
                       <h2 data-bind="text: data">12.05.0892</h2>
                       <p data-bind="text: text">alsdkfbasdlkcnsadkcn aslkdbca</p>
                   </div>
              <!-- /ko -->
            <button data-bind="click: function () { viewModel.createTask() }">дОБАВИТЬ</button>

        </div>
    </section>
    </main>

    <script>

    </script>
<?php require_once "components/footer.php"?>