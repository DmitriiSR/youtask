<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>
<script>
    setDbInViewModel('tasks', 'projects');
    getDB('tasks', 'projects');
    newObj('tasks');
</script>
<div class="home">
    <div class="container-fluid my-container" style="height: 100vh;">
        
        <?php require_once "components/sidebar-bs.php"?>

        <div class="col-10 ms-auto p-5">
            <div class="row">
            <?php require_once "components/header-row.php"?>
                
                <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-xxl-4 col-lg-6 col-sm-12 mb-5" style="height: 606px">
                        <div class="overdue p-3 shadow rounded-3 bg-white d-flex flex-column h-100" style="min-width: 250px;">
                            <img src="images/home/overdue-tasks-background.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title text-danger">Ваши задачи на сегодня</h4>
                                <div class="overdue__list mt-4">
                                    <!-- ko if: viewModel.tasks().length <= 1 -->
                                        <div class="overdue__none d-flex flex-column align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#53B6FD" fill-opacity="0.3" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                            </svg>
                                            <p class="card-text text-center mt-4" style="color: #53B6FD; opacity: 0.33;">У вас нет задач на сегодня</p>
                                        </div>
                                    <!-- /ko -->
                                     <!-- ko foreach: viewModel.tasks -->
                                         <!-- ko if: Number(userid) === Number(cookieObj.userid) && DateTime.now().toFormat('y-LL-dd') === DateTime.fromISO(taskdate).toFormat('y-LL-dd') -->
                                            <div class="myprojects__list-item d-flex flex-wrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="var(--color1)" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                </svg>
                                                <p class="card-text">
                                                    <span data-bind="text: tasktext"></span>
                                                    <br>
                                                    <date data-bind="text: DateTime.fromISO(taskdate).toFormat('dd.LL.yyyy')" class="fs-6" style="color:var(--color1);"></date>
                                                </p>
                                            </div>
                                         <!-- /ko -->
                                      <!-- /ko -->
                                </div>
                            </div>
                            <button class="btn btn-primary align-self-center mt-auto">Показать еще</button>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-lg-6 col-sm-12 d-flex flex-column justify-content-between" style="height: 606px">
                        <div class="myprojects p-3 shadow rounded-3 bg-white d-flex flex-column" style="min-width: 250px;">
                            <img src="images/home/my-projects-background.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title" style="color: var(--color1);">Мои проекты</h4>
                                <div class="myprojects__list overflow-auto" style="height: 130px;">
                                    <!-- ko if: viewModel.projects().length === 0 -->
                                        <div class="overdue__none d-flex flex-column align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#53B6FD" fill-opacity="0.3" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                            </svg>
                                            <p class="card-text text-center mt-4" style="color: #53B6FD; opacity: 0.33;">У вас нет открытых проектов</p>
                                        </div>
                                    <!-- /ko -->
                                     <!-- ko foreach: viewModel.projects -->
                                         <!-- ko if: Number(userid) === Number(cookieObj.userid) -->
                                             <div class="myprojects__list-item d-flex flex-wrap rounded-3 p-3 bg-info mb-3" style="cursor: pointer">

                                                 <h5 data-bind="text: title" class="me-3"></h5>
                                                 <span data-bind="text: description" class="fs-6 text-truncate"></span>
                                            </div>
                                         <!-- /ko -->
                                      <!-- /ko -->
                                </div>
                            </div>
                            <button class="btn btn-primary align-self-center mt-auto">Показать еще</button>
                        </div>

                        <div class="chat-card p-3 shadow rounded-3 bg-white d-flex flex-column mt-3" style="min-width: 250px;">
                            <h4 class="card-title" style="color: #53B6FD;">Чат</h4>
                            <div class="card-body d-flex flex-wrap">
                                <a href="#" class="me-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="#ffffff" class="bi bi-person rounded-circle p-2 shadow" viewBox="0 0 16 16" style="background-color: #F2994A;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                </a>

                                <a href="#" class="me-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="#ffffff" class="bi bi-person rounded-circle p-2 shadow" viewBox="0 0 16 16" style="background-color: #44C869;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                </a>

                                <a href="#" class="me-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="#ffffff" class="bi bi-person rounded-circle p-2 shadow" viewBox="0 0 16 16" style="background-color: #F2C94C;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                </a>

                                <a href="#" class="me-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="#ffffff" class="bi bi-person rounded-circle p-2 shadow" viewBox="0 0 16 16" style="background-color: #BB6BD9;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                </a>

                                <a href="#" class="me-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="#53B6FD" class="bi bi-person rounded-circle p-3 shadow" viewBox="0 0 16 16" style="background-color: #DBF0FF;">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>

    <script>
        viewModel.linkIndicator = 'home';
    </script>
<?php require_once "components/footer.php"?>



