<?php require_once "components/header.php"?>

<div class="row">
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая задача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-9">
                        <label class="form-label w-100">
                            <span>Название задачи</span>
                            <input type="text" class="form-control" placeholder="Название">
                        </label>
                    </div>
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="#0d6efd" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                </svg>
                                <a class="nav-link active" aria-current="page" href="#">Срок</a>
                            </li>
                            <li class="list-group-item list-group-item-action d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="#0d6efd" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                <a class="nav-link" href="#">Описание</a>
                            </li>
                            <li class="list-group-item list-group-item-action d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="#0d6efd" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                    <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                </svg>
                                <a class="nav-link" href="#">Категория</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Добавить</button>
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

