<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

<body>

<div class="mytasks">
    <div class="container-fluid my-container" style="height: 100vh;">
        <?php require_once "components/sidebar-bs.php"?>

        <div class="col-10 ms-auto p-5">
            <?php require_once "components/header-row.php"?>
                <div class="mt-5">
                    <a href="#" data-bind="click: function () {createNew('tasks');}" data-bs-toggle="modal" data-bs-target="#addTask" type="button" id="addTaskButton" style="color: var(--color1);"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>Добавить задачу</a>
                </div>
                    <div class="row d-flex">
                        <!-- ko foreach: viewModel.tasks -->
                            <div class="col-md-4 col-sm-12">
                                <div class="card me-3 mt-4 rounded-3">
                                    <img src="https://via.placeholder.com/300.png/09f/fffC/" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 data-bind="text: tasktitle" class="card-title"></h5>
                                        <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-success">Выполнить</button>
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
            </div>
            <div class="modal-body icons-block">
                <a href="#" title="Добавить дату">
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
    viewModel.filter = ko.observable('all');
    viewModel.linkIndicator = 'myTasks';



</script>


<?php require_once "components/footer.php"?>
