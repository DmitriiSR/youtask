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

<div class="mytasks">
    <div class="container-fluid my-container" style="height: 100vh;">
        <?php require_once "components/sidebar-bs.php"?>

        <div class="col-10 ms-auto p-5">
            <div class="row d-flex justify-content-center">
                <?php require_once "components/header-row.php"?>

                <div class="col-xxl-8 col-lg-12 overflow-auto">
                    <div class="mytasks__inner card mt-5 p-3 shadow rounded-3 bg-white d-flex flex-column" style="min-height: 606px;">
                        <img src="images/mytasks/mytasks-block-background.png" alt="" class="card-img-top">
                        <div class="mytasks__inner-header d-flex justify-content-between mt-3 fs-5" style="color: var(--color1);">
                            <div><p>Задачи</p></div>
                            
                            <div class="text-end">
                                <p id="tasksFilterBtn" data-bind="click: function () {viewModel.popupVisible(!viewModel.popupVisible())}" style="cursor: pointer;">
                                    <!-- ko if: viewModel.filter() === 'all' -->
                                        <span>Все задачи</span>
                                    <!-- /ko -->
                                    <!-- ko if: viewModel.filter() === 'done' -->
                                        <span>Выполненные задачи</span>
                                    <!-- /ko -->
                                    <!-- ko if: viewModel.filter() === 'overdue' -->
                                        <span>Просроченные задачи</span>
                                    <!-- /ko -->

                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </p>
                            </div>

                                <div class="mytasks__filter p-3 shadow rounded-3 bg-white position-absolute end-0" id="taskFilterPopup" data-bind="visible: viewModel.popupVisible">
                                    <div class="row mb-2">
                                        <a data-bind="click: function () {viewModel.filter('all'); viewModel.popupVisible(false);}" href="" style="color: var(--color1);"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-file-earmark me-3" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                        </svg>Все задачи</a>
                                    </div>
                                    <div class="row mb-2">
                                        <a data-bind="click: function () {viewModel.filter('done'); viewModel.popupVisible(false);}" href="" class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                        </svg>Выполненные задачи</a>
                                    </div>
                                    <div class="row">
                                        <a data-bind="click: function () {viewModel.filter('overdue'); viewModel.popupVisible(false);}" href="" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-stopwatch me-3" viewBox="0 0 16 16">
                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                        </svg>Просроченные задачи</a>
                                    </div>
                                </div>                                
                        </div>
                        <div class="">
                            <a href="" data-bind="click: function () {clearForm(); newObj('tasks');}" data-bs-toggle="modal" data-bs-target="#addTask" type="button" id="addTaskButton" style="color: var(--color1);"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>Добавить задачу</a>
                        </div>
                        <div class="mytasks__inner-body overflow-scroll">
                            

                            <!-- ko if: viewModel.filter() === 'all' -->
                                <!-- ko foreach: viewModel.tasks() -->
                                    <!-- ko if: Number(userid) === Number(cookieObj.userid) && status === 'open'-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border-bottom mt-3 p-3">
                                                <div class="d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                    </svg>
                                                    <h5 data-bind="text: tasktitle"></h5>
                                                </div>
                                                
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="text-secondary">Выполнить до:</span>
                                                    <span data-bind="text: taskdate"></span>
                                                </div>

                                                <div class="overflow-auto">
                                                    <span data-bind="text: tasktext"></span>
                                                </div>
                                                
                                                <div class="d-flex mt-3">
                                                    <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                    <button data-bind="click: function () {editOneField('tasks', id, {status: 'closed'});}" class="btn btn-success">Выполнено</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        <!-- /ko -->
                                    <!-- /ko -->
                                <!-- /ko -->

                                <!-- ko if: viewModel.filter() === 'done' -->
                                    <!-- ko foreach: viewModel.tasks() -->
                                        <!-- ko if: Number(userid) === Number(cookieObj.userid) && status === 'closed'-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border-bottom mt-3 p-3">
                                                    <div class="d-flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                        </svg>
                                                        <h5 data-bind="text: tasktitle"></h5>
                                                    </div>

                                                    <div class="d-flex flex-column align-items-center">
                                                        <span class="text-secondary">Выполнить до:</span>
                                                        <span data-bind="text: taskdate"></span>
                                                    </div>

                                                    <div class="overflow-auto">
                                                        <span data-bind="text: tasktext"></span>
                                                    </div>
                                                    
                                                    <div class="d-flex mt-3">
                                                        <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                        <button data-bind="click: function () {editOneField('tasks', id, {status: 'open'});}" class="btn btn-success">Вернуть</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /ko -->
                                    <!-- /ko -->
                                <!-- /ko -->

                                <!-- ko if: viewModel.filter() === 'overdue' -->
                                    <!-- ko foreach: viewModel.tasks() -->
                                        <!-- ko if: Number(userid) === Number(cookieObj.userid) && ( Number(DateTime.now().toFormat('L')) > Number(DateTime.fromISO(taskdate).toFormat('L')) ||
                                        Number(DateTime.now().toFormat('yyyy')) > Number(DateTime.fromISO(taskdate).toFormat('yyyy'))  ||
                                        Number(DateTime.now().toFormat('d')) > Number(DateTime.fromISO(taskdate).toFormat('d')) )-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border-bottom mt-3 p-3">
                                                        <div class="d-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                            </svg>
                                                            <h5 data-bind="text: tasktitle"></h5>
                                                        </div>

                                                        <div class="d-flex flex-column align-items-center">
                                                            <span class="text-secondary">Выполнить до:</span>
                                                            <span data-bind="text: taskdate"></span>
                                                        </div>

                                                        <div class="overflow-auto">
                                                            <span data-bind="text: tasktext"></span>
                                                        </div>
                                                        
                                                        <div class="d-flex mt-3">
                                                            <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                            <button data-bind="click: function () {editOneField('tasks', id, {status: 'closed'});}" class="btn btn-success">Выполнено</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /ko -->
                                    <!-- /ko -->
                                <!-- /ko -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="addTaskLabel">Добавить задачу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body inputs-to-clear">
                <label class="form-label w-100 mb-3">
                <span>Название задачи</span>
                <input data-bind="value: storage.get('tasks').tasktitle;" type="text" class="form-control">
                </label>

                <label class="form-label w-100 mb-3">
                <span>Описание задачи</span>
                <input data-bind="value: storage.get('tasks').tasktext;" type="text" class="form-control">
                </label>

                <label class="form-label w-100 mb-3">
                <span>Закончить к:</span>
                <input data-bind="value: storage.get('tasks').taskdate;" type="date">
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button data-bind="click: function() {
                    storage.get('tasks').project_id(0);
                    storage.get('tasks').status('open');
                    set(storage.get('tasks'));}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
            </div>
        </div>
    </div>
</div>

<script>
    viewModel.filter = ko.observable('all');
    viewModel.linkIndicator = 'myTasks';
    viewModel.popupVisible = ko.observable(false);

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