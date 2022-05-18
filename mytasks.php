<?php require_once "components/header.php"?>


<body>

<div class="mytasks">
    <div class="container-fluid my-container" style="height: 100vh;">
        <?php require_once "components/sidebar-bs.php"?>

        <div class="col-10 ms-auto p-5">
            <?php require_once "components/header-row.php"?>
            <h2 class="mt-5">Фильтр</h2>
            <div class="row">
                <div class="col-4">
                    <div class="d-flex">
                        <label class="form-label w-100 me-2">
                            <span>Поиск по названию</span>
                            <input data-bind="value: viewModel.filter.tasks.tasktitle" type="search" class="form-control" placeholder="Поиск">
                        </label>
                        <label>
                            <span style="opacity: 0">.</span>
                            <button class="form-control">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="#0d6efd" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </label>

                    </div>


                </div>
            </div>
            <h2 class="mt-3">Задачи</h2>
                <div>
                    <a href="#" data-bind="click: function () {createNew('tasks'); clearForm();}" data-bs-toggle="modal" data-bs-target="#addTask" type="button" id="addTaskButton" style="color: var(--color1);"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>Добавить задачу</a>
                </div>

                    <div class="row d-flex">
                        <!-- ko foreach: viewModel.tasks -->
                            <div class="col-12 col-sm-6 col-md-4 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 data-bind="text: tasktitle" class="card-title"></h5>
                                        <p data-bind="text: tasktext" class="card-text"></p>
                                        <div class="pb-3 d-flex flex-wrap">
                                            <div class="badge bg-info text-wrap text-white d-flex align-items-center ms-3" style="width: fit-content">
                                                <span class="">Учеба</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <button href="#" class="btn btn-success me-3">Выполнено</button>
                                            <div class="">
                                                <a href="#" class="card-link text-primary">Редактировать</a>
                                                <a data-bind="click: function () {remove('tasks', id())}" href="#" class="card-link text-danger">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /ko -->
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
                <div data-bind="foreach: viewModel.inputsArr" class="">
                    <div class="d-flex align-items-center">
                            <label class="form-label w-100 mb-3">
                                <span>Закончить к:</span>
                                <input data-bind="value: storage.get('tasks').taskdate, attr: {min: DateTime.now().toFormat('yyyy-LL-dd')}" type="date" class="form-control">
                            </label>
                            <a href="#" data-bind="click: function () {
                                viewModel.inputsArr(viewModel.ebala(viewModel.inputsArr(), 'date'));}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg ms-3" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                            </a>
                    </div>
                </div>

            </div>
            <div class="modal-body icons-block">
                    <a href="#" data-bind="click: function () {if(!viewModel.inputsArr().includes('date')){ viewModel.inputsArr.push('date')}}" title="Добавить дату">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                        </svg>
                    </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button data-bind="click: function () {
                        storage.get('tasks').project_id(0);
                        storage.get('tasks').status('open');
                        set('tasks', storage.get('tasks'));
                    }" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
            </div>
        </div>
    </div>
</div>

<script>
    viewModel.linkIndicator = 'myTasks';
    viewModel.inputsArr = ko.observableArray([]);
    viewModel.ebala = function (arr, str) {
        arr.splice(str);
        return arr;
    }

</script>


<?php require_once "components/footer.php"?>
