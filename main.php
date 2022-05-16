<?php require_once "components/header.php"?>
<!--<script>-->
<!--    newObj('tasks');-->
<!--</script>-->
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

