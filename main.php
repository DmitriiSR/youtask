<?php require_once "components/header.php"?>

<div class="row m-5 pt-5">
    <div class="col-12 col-sm-6 col-md-4 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="pb-3 d-flex flex-wrap">
                    <div class="badge bg-light text-wrap text-black-50 d-flex align-items-center" style="width: fit-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock me-1" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                        <span class="">15.06.2022</span>
                    </div>
                    <div class="badge bg-info text-wrap text-white d-flex align-items-center ms-3" style="width: fit-content">
                        <span class="">Учеба</span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <button href="#" class="btn btn-success">Выполнено</button>
                    <div class="ms-auto">
                        <a href="#" class="card-link text-primary">Редактировать</a>
                        <a href="#" class="card-link text-danger">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <button data-bind="click: function () { createNew('tasks') }" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask" >Добавить</button>
     <!-- ko foreach: viewModel.tasks -->
         <div class="row">
            <div class="col">
                <div class="panel bg-white shadow-lg p-4 mt-4 rounded-3">
                    <h3 data-bind="text: tasktitle"></h3>
                    <p data-bind="text: tasktext" class="mb-0"></p>
                    <p data-bind="text: DateTime.fromISO(taskdate()).toFormat('dd.LL.yyyy')" class="text-muted fs-6 lh-sm"></p>
                    <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger">Удалить</button>
                    <button data-bind="click: function () {setData('tasks' ,$data)}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">Редактировать</button>
                </div>
            </div>
        </div>
      <!-- /ko -->
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
                    <input data-bind="value: storage.get('tasks').tasktitle" type="text" class="form-control">
                </label>

                <label class="form-label w-100 mb-3">
                    <span>Описание задачи</span>
                    <input data-bind="value: storage.get('tasks').tasktext" type="text" class="form-control">
                </label>

                <label class="form-label w-100 mb-3">
                    <span>Закончить к:</span>
                    <input data-bind="value: storage.get('tasks').taskdate, attr: {min: DateTime.now().toFormat('yyyy-LL-dd')}" type="date" class="form-control">
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <!-- ko if: storage.get('tasks').id === '' -->
                    <button data-bind="click: function () {
                        storage.get('tasks').project_id(0);
                        storage.get('tasks').status('open');
                        set('tasks', storage.get('tasks'));
                    }" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
                <!-- /ko -->
                <!-- ko if: storage.get('tasks').id !== '' -->
                <button data-bind="click: function () {set('tasks', storage.get('tasks'));}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
                <!-- /ko -->
            </div>
        </div>
    </div>
</div>
<?php require_once "components/footer.php"?>

