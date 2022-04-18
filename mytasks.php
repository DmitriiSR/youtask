<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>
<body>

<script>
    setDbInViewModel('tasks');
    getDB('tasks');
    newObj('tasks');
</script>





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
                <div class="tasks__filter-btn">
                    <span id="tasksFilterBtn" data-bind="click: function () {viewModel.popupVisible(!viewModel.popupVisible())}" style="display: flex">Все задачи<svg class="icon" style="margin-left: 13px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#arrow-down"></use>
                            </svg></span>
                    <div id="taskFilterPopup" data-bind="visible: viewModel.popupVisible" class="tasks__filter">
                        <a href="" style="display: flex; align-items: center; padding-bottom: 20px;"><svg class="icon" style="margin-right: 11px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#icon-note-blue"></use>
                            </svg>Все задачи</a>
                        <a href="" style="display: flex; align-items: center; padding-bottom: 20px;"><svg class="icon" style="margin-right: 11px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#icon-done-green"></use>
                            </svg>Выполненные задачи</a>
                        <a href="" style="display: flex; align-items: center;;"><svg class="icon" style="margin-right: 11px;" aria-hidden="true" focusable="false">
                                <use href="images/sprite.svg#icon-timer-red"></use>
                            </svg>Просроченные задачи</a>
                    </div>
                </div>
            </header>
            <div>
                <div class="" style="margin-top: 15px;">
                    <button class="addtaskbtn" data-bind="click: function () {

                                viewModel.addTaskVisible(!viewModel.addTaskVisible());
                                newObj('tasks');
                    }"><svg class="icon" style="margin-right: 13px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-add"></use>
                    </svg>Добавить задачу</button>
                    </div>
                    <div class="addtask" data-bind="visible: viewModel.addTaskVisible">                
                    <label style="margin-bottom: 20px">
                        <input id="inputText" data-bind="value: storage.get('tasks').tasktext;" type="text" placeholder="Название задачи">
                    </label>
                    <label>
                        <input id="inputDate" data-bind="value: storage.get('tasks').taskdate;" type="date" placeholder="Закончить к" style="width: 235px">
                    </label>
                    <div class="buttons__block">
                        <button data-bind="click: function () {viewModel.addTaskVisible(false)};" style="margin-top:15px;" class="btn">Отменить</button>
                        <button data-bind="click: function() {
                                        set(storage.get('tasks'));
                                        viewModel.addTaskVisible(false);
                        }" style="margin-top:15px;" class="btn">Добавить</button>
                    </div>
                </div>
            </div>
            <!-- ko foreach: viewModel.tasks() -->
                <!-- ko if: Number(userid) === Number(cookieObj.userid) -->
                    <div class="" style="margin-top: 30px; position: relative;">
                        <div class="task">
                            <div style="display: flex; align-items: center;">
                                <svg class="icon" style="margin-right: 13px;" aria-hidden="true" focusable="false">
                                    <use href="images/sprite.svg#icon-dobe-black"></use>
                                </svg>
                                <h2 data-bind="text: tasktext" style="font-weight: 400; font-size: 16px; line-height: 20px; color: #000000;"></h2>
                            </div>
                            <span data-bind="text: taskdate"></span>
                            <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger">Удалить</button>
                        </div>
                    </div>
                 <!-- /ko -->
            <!-- /ko -->

        </div>

    </section>
    </main>

    <script>
            viewModel.popupVisible = ko.observable(false);
            viewModel.addTaskVisible = ko.observable(false);
            viewModel.taskEditPopup = ko.observable(false);

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
    <script>

    </script>
<?php require_once "components/footer.php"?>