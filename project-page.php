<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

<script>
    setDbInViewModel('tasks');
    getDB('tasks');
    newObj('tasks');
</script>

<div class="container-fluid my-container" style="height: 100vh;">
    
<?php require_once "components/sidebar-bs.php"?>
    

    <div class="col-10 ms-auto p-5 projects">
        <div class="row">
            <div class="col-12">
                <header class="bootstrap-header d-flex justify-content-between fw-bold fs-4">
                    <a href="">Проекты</a>
                    <time id='date'>2 марта 2022, среда</time>   
                </header>
            </div>
        </div>

        <div class="row mt-5 d-flex justify-content-center">
            
                <div class="col-xxl-3 col-md-4 col-sm-12">
                    <div class="projects__card p-3 mb-4 shadow rounded-3 overflow-auto" style="height: 606px;">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-info">Новые задачи</h5>
                                 
                                     <!-- ko foreach: viewModel.tasks() -->
                                        <!-- ko if: Number(userid) === Number(cookieObj.userid) && status === 'newProjectTask' && getIdFromUrl() === +project_id -->
                                            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column justify-content-between align-items-center border-bottom mt-3 p-3">
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

                                                        <div class="overflow-auto text-center">
                                                            <span data-bind="text: +project_id"></span>
                                                            <span data-bind="text: tasktext"></span>
                                                        </div>

                                                        <div class="d-flex mt-3">
                                                            <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                            <button data-bind="click: function () {editOneField('tasks', id, {status: 'onwork'});}" class="btn btn-success">Взять в работу</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /ko -->
                                    <!-- /ko -->
                                
                                    
                        </div> 
                    </div>
                </div>

                <div class="col-xxl-3 col-md-4 col-sm-12">
                    <div class="projects__card p-3 mb-4 shadow rounded-3" style="height: 606px;">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-primary">Задачи в работе</h5>

                                   <!-- ko foreach: viewModel.tasks() -->
                                        <!-- ko if: Number(userid) === Number(cookieObj.userid) && status === 'onwork' && getIdFromUrl() === +project_id -->
                                        <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column justify-content-between align-items-center border-bottom mt-3 p-3">
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

                                                        <div class="overflow-auto text-center">
                                                            <span data-bind="text: tasktext"></span>
                                                        </div>

                                                        <div class="d-flex mt-3">
                                                            <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                            <button data-bind="click: function () {editOneField('tasks', id, {status: 'success'});}" class="btn btn-success">Выполнено</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /ko -->
                                    <!-- /ko -->
                        </div>     
                    </div>
                </div>

                <div class="col-xxl-3 col-md-4 col-sm-12">
                    <div class="projects__card p-3 mb-4 shadow rounded-3" style="height: 606px;">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-success">Выполненные задачи</h5>

                                   <!-- ko foreach: viewModel.tasks() -->
                                        <!-- ko if: Number(userid) === Number(cookieObj.userid) && status === 'success' && getIdFromUrl() === +project_id -->
                                        <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column justify-content-between align-items-center border-bottom mt-3 p-3">
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

                                                        <div class="overflow-auto text-center">
                                                            <span data-bind="text: tasktext"></span>
                                                        </div>

                                                        <div class="d-flex mt-3">
                                                            <button data-bind="click: function () {remove('tasks', id)}" class="btn btn-danger me-2">Удалить</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /ko -->
                                    <!-- /ko -->
                        </div>    
                    </div>
                </div>
            
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <button data-bind="click: function () {clearForm(); newObj('tasks');}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectTask" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>Добавить задачу
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProjectTask" tabindex="-1" aria-labelledby="addProjectTaskLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectTaskLabel">Добавить задачу</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <label class="form-label w-100 mb-3">
                <span>Название задачи</span>
                <input data-bind="value: storage.get('tasks').tasktitle;" type="text" class="form-control">
            </label>

            <label class="form-label w-100 mb-3">
                <span>Описание задачи</span>
                <textarea data-bind="value: storage.get('tasks').tasktext;" class="form-control" rows="3"></textarea>
            </label>

            <label class="form-label w-100 mb-3" id="sandbox-container">
                <span>Срок выполнения:</span>
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="start" />
                    <span class="input-group-text">До</span>
                    <input data-bind="value: storage.get('tasks').taskdate;" type="text" class="input-sm form-control" name="end" />
                </div>
            </label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button data-bind="click: function () {storage.get('tasks').project_id(getIdFromUrl()); storage.get('tasks').status('newProjectTask'); set(storage.get('tasks'));}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
      </div>
    </div>
  </div>
</div>

<script>
    viewModel.filter = ko.observable('all');

    $('#sandbox-container .input-daterange').datepicker({
        format: "dd-mm-yyyy",
        language: "ru",
        autoclose: true,
        todayHighlight: true
    });
</script>

<?php require_once "components/footer.php"?>
