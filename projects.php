<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

<script>
    setDbInViewModel('projects');
    getDB('projects');
    newObj('projects');
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
            <div class="overdue p-3 shadow rounded-3 bg-white d-flex flex-column h-100">
                <h2 class="text-start">Проекты</h2>
                <button data-bind="click: function () {newObj('projects')}" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addProject" type="button" style="width: fit-content;">Создать проект</button>
                <!-- ko foreach: viewModel.projects -->
                     <!-- ko if: Number(userid) === Number(cookieObj.userid) -->
                        <div data-bind="click: function () {location.href = '/project-page.php/' + id}" class="bg-light p-3 rounded-3 mb-4" style="cursor: pointer;">
                        <h3 data-bind="text: title" class="text-start">Название проекта</h3>
                        <p data-bind="text: description" class="text-start text-secondary">Описание проекта</p>
                        <button class="btn btn-danger" data-bind="click: function () {remove('projects', id)}">Удалить</button>
                        <button class="btn btn-success">Редактировать</button>
                        </div>
                    <!-- /ko -->
                <!-- /ko -->
            </div>          
        </div>
    </div>
</div>

<div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectLabel">Добавить проект</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <label class="form-label w-100 mb-3">
                <span>Название проекта</span>
                <input data-bind="value: storage.get('projects').title" type="text" class="form-control">
            </label>

            <label class="form-label w-100 mb-3">
                <span>Описание проекта</span>
                <textarea data-bind="value: storage.get('projects').description" class="form-control" rows="3"></textarea>
            </label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button data-bind="click: function () {set(storage.get('projects'))}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Добавить</button>
      </div>
    </div>
  </div>
</div>
<script>
    viewModel.linkIndicator = 'projects';
</script>
<?php require_once "components/footer.php"?>
