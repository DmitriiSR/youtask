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
                <div class="col-3">
                    <label class="form-label w-100 me-2">
                        <span>Поиск по дате</span>
                        <input data-bind="value: viewModel.filter.tasks.taskdate" type="date" class="form-control">
                    </label>
                </div>
                <div class="col-3">
                    <label class="form-label w-100 me-2">
                        <span>Категории</span>
                        <select data-bind="multiselect: viewModel.categoriesArr(), value: viewModel.filter.tasks.category_id" class="form-select">
                        </select>
                    </label>
                </div>
            </div>

            <h2 class="mt-3">Задачи</h2>
                <div>
                    <a href="#" data-bind="click: function () {createNew('tasks'); clearForm(); viewModel.inputsArr([]);}" data-bs-toggle="modal" data-bs-target="#addTask" type="button" id="addTaskButton" style="color: var(--color1);"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>Добавить задачу</a>
                </div>

                    <div class="row d-flex">
                        <!-- ko foreach: viewModel.tasks -->
                            <div class="col-12 col-sm-6 col-xxl-4 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 data-bind="text: tasktitle" class="card-title"></h5>
                                        <p data-bind="text: tasktext" class="card-text"></p>
                                        <div class="pb-3 d-flex flex-wrap">
                                            <!-- ko if: taskdate() !== '' -->
                                                <div class="badge bg-light text-wrap text-black-50 d-flex align-items-center me-3" style="width: fit-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock me-1" viewBox="0 0 16 16">
                                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                                    </svg>
                                                    <span data-bind="text: DateTime.fromISO(taskdate()).toFormat('dd.LL.yyyy')"></span>
                                                </div>
                                            <!-- /ko -->
                                             <!-- ko foreach: viewModel.tasks_categories -->
                                                    <!-- ko if: $parent.category_id() === id() -->
                                                        <div data-bind="attr: {style: 'background-color:' + color() + ';'}" class="badge text-wrap text-white d-flex align-items-center" style="width: fit-content">
                                                          <span data-bind="text: title"></span>
                                                        </div>
                                                    <!-- /ko -->
                                              <!-- /ko -->
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <button href="#" class="btn btn-success me-3">Выполнено</button>
                                            <div class="">
                                                <a href="#" data-bind="click: function () {
                                                    setData('tasks', $data);
                                                    viewModel.checkInputsArr($data);
                                                }" data-bs-toggle="modal" data-bs-target="#addTask" class="card-link text-primary">Редактировать</a>
                                                <a data-bind="click: function () {remove('tasks', id)}" href="#" class="card-link text-danger">Удалить</a>
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
                <div data-bind="foreach: viewModel.inputsArr">
                    <!-- ko if: $data === 'taskdate' -->
                    <div class="d-flex align-items-center">
                            <label class="form-label w-100 mb-3">
                                <span>Закончить к:</span>
                                <input data-bind="value: storage.get('tasks').taskdate, attr: {min: DateTime.now().toFormat('yyyy-LL-dd')}" type="date" class="form-control">
                            </label>
                            <a href="#" data-bind="click: function () {
                                viewModel.inputsArr(viewModel.returnArr(viewModel.inputsArr(), 'taskdate'));}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg ms-3" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                            </a>
                    </div>
                    <!-- /ko -->

                    <!-- ko if: $data === 'tasktext' -->
                    <div class="d-flex align-items-center">
                        <label class="form-label w-100 mb-3">
                            <span>Описание задачи:</span>
                            <input data-bind="value: storage.get('tasks').tasktext" type="text" class="form-control">
                        </label>
                        <a href="#" data-bind="click: function () {
                                viewModel.inputsArr(viewModel.returnArr(viewModel.inputsArr(), 'tasktext'));}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg ms-3" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                            </a>
                    </div>
                    <!-- /ko -->
                </div>
                <div data-bind="visible: viewModel.taskCategoryVisible;" style="display: none">
                    <div class="d-flex align-items-center">
                            <label class="form-label w-100 mb-3">
                                <span>Название категории:</span>
                                <input data-bind="value: storage.get('tasks_categories').title" type="text" class="form-control">
                            </label>
                            <label class="form-label w-100 mb-3">
                                <span>Цвет категории:</span>
                                <input data-bind="value: storage.get('tasks_categories').color" type="color" class="form-control">
                            </label>
                            <a href="#" data-bind="click: function () {
                                    viewModel.taskCategoryVisible(false);
                                }">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg ms-3" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                                </a>
                    </div>
                </div>

            </div>
            <div class="modal-body icons-block">
                    <a href="#" class="me-3" data-bind="click: function () {if(!viewModel.inputsArr().includes('taskdate')){ viewModel.inputsArr.push('taskdate')}
                    }" title="Добавить дату">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                        </svg>
                    </a>

                    <a href="#" class="me-3" data-bind="click: function () {if(!viewModel.inputsArr().includes('tasktext')){ viewModel.inputsArr.push('tasktext')} }" title="Добавить описание">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>

                    <a href="#" class="me-3" data-bind="click: function () {
                        createNew('tasks_categories');
                        viewModel.taskCategoryVisible(true);
                    }" title="Добавить категорию">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                            <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                        </svg>
                    </a>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <!-- ko if: storage.get('tasks').id() === '' -->
                <button data-bind="click: function () {
                        storage.get('tasks').project_id(0);
                        storage.get('tasks').status('open');
                        if (storage.get('tasks_categories').title() !== '') {
                            set('tasks_categories', storage.get('tasks_categories'), function (res) {
                                storage.get('tasks').category_id(res);
                                set('tasks', storage.get('tasks'), () => window.location.reload());
                            });
                        } else {
                            storage.get('tasks').category_id(0);
                            set('tasks', storage.get('tasks'), () => window.location.reload());
                        }

                    }" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
                <!-- /ko -->

                <!-- ko if: storage.get('tasks').id() !== '' -->
                <button data-bind="click: function () {
                        set('tasks', storage.get('tasks'), () => window.location.reload());
                    }" type="button" class="btn btn-primary" data-bs-dismiss="modal">Сохранить</button>
                <!-- /ko -->
            </div>
        </div>
    </div>
</div>

<script>
    viewModel.linkIndicator = 'myTasks';
    viewModel.inputsArr = ko.observableArray([]);
    viewModel.returnArr = function (arr, str) {
        let index = arr.indexOf(str);
        arr.splice(index, 1);

        return arr;
    }
    viewModel.checkInputsArr = function (obj) {
        const arr = ['taskdate', 'tasktext'];
        for (let key in obj) {
            obj[key] = obj[key]();
            if(obj[key] === '' && arr.includes(key)) {
                let index = arr.indexOf(key);
                arr.splice(index, 1);
            }
        }
        viewModel.inputsArr(arr);
    }
    viewModel.taskCategoryVisible = ko.observable(false);

    viewModel.categoriesArr = ko.observableArray(
        viewModel.tasks_categories().map(function (elem) {
            let finalElem = {};
            for (let key in elem) {
                if(key === 'id' || key === 'title') {
                    if (key === 'id') {
                        finalElem.value = elem[key]();
                    } else {
                        finalElem.key = elem[key]();
                    }
                }
            }
            return finalElem;
        })
    )

</script>

<?php require_once "components/footer.php"?>
