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
            <header class="tasks__header" style="display: flex; justify-content: space-between;">
                <span>Задачи</span>
                <div style="position: relative;">
                    <span id="tasksFilterBtn" data-bind="click: function () {viewModel.popupVisible(!viewModel.popupVisible())}" style="margin-left: auto; cursor: pointer;">Все задачи</span>
                    <div id="taskFilterPopup" data-bind="visible: viewModel.popupVisible" style="width: max-content; position: absolute; top: 120%; right: 0; padding: 20px 30px; background: #ffffff; border-radius: 17px;  box-shadow: 5px 5px 25px rgba(43, 144, 218, 0.25);">
                        <a href="" style="display: block; padding-bottom: 20px;">Все задачи</a>
                        <a href="" style="display: block; padding-bottom: 20px;">Выполненные задачи</a>
                        <a href="" style="display: block;">Просроченные задачи</a>
                    </div>
                </div>
            </header>
            <div>
                <button class="addtaskbtn" data-bind="click: function () {
                            viewModel.taskTitle('');
                            viewModel.taskDate('');
                            viewModel.addTaskVisible(!viewModel.addTaskVisible());
                }" style="padding: 10px; background: transparent; margin-top:15px;">Добавить задачу</button>
                <div class="addtask" data-bind="visible: viewModel.addTaskVisible" style="display: flex; flex-direction: column; padding: 20px; background: #ffffff; border-radius: 17px;  box-shadow: 5px 5px 25px rgba(43, 144, 218, 0.25); position: absolute; width:max-content;">
                    <label style="margin-bottom: 20px">
                        <input data-bind="value: viewModel.taskTitle;" type="text" placeholder="Название задачи">
                    </label>
                    <label>
                        <input data-bind="value: viewModel.taskDate;" type="date" placeholder="Закончить к">
                    </label>
                    <div>
                        <button data-bind="click: function () {viewModel.addTaskVisible(false)};" style="padding: 10px; background: transparent; margin-top:15px;">Отменить</button>
                        <button data-bind="click: function() {
                                        viewModel.addTask();
                                        viewModel.addTaskVisible(false);
                        }" style="padding: 10px; background: transparent; margin-top:15px;">Добавить</button>
                    </div>
                </div>
            </div>
            <!-- ko foreach: viewModel.tasksArray -->
                <div class="" style="margin-top: 30px">
                    <div class="">
                        <h2 data-bind="text: title"></h2>
                        <span data-bind="text: date"></span>
                    </div>
                </div>
            <!-- /ko -->

        </div>
    </section>
    </main>

    <script>
        viewModel.popupVisible = ko.observable(false);
        viewModel.addTaskVisible = ko.observable(false);
        viewModel.tasksArray = ko.observableArray([]);
        viewModel.taskTitle = ko.observable();
        viewModel.taskDate = ko.observable();
        viewModel.addTask = function () {
            var task = {};
            task.title = viewModel.taskTitle();
            task.date = viewModel.taskDate();
            viewModel.tasksArray.push(task);
            console.log(viewModel.tasksArray());
        }
    </script>
    <script>
        $(document).click(function (e) {
            let popup = $('.addtask');
            let btn = $('.addtaskbtn');

            if ( ! btn.is(e.target) && btn.has(e.target).length === 0 &&
                ! popup.is(e.target) && popup.has(e.target).length === 0
            ) {
                viewModel.addTaskVisible(false);
            }
        });

        $(document).click(function (e) {
            let popup = $('#taskFilterPopup');
            let btn = $('#tasksFilterBtn');

            if ( ! btn.is(e.target) && btn.has(e.target).length === 0 &&
                ! popup.is(e.target) && popup.has(e.target).length === 0
            ) {
                viewModel.popupVisible(false);
            }
        });
    </script>
<?php require_once "components/footer.php"?>