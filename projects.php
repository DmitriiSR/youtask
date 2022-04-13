<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

<div class="container-fluid my-container">
    <div class="row">
        <aside class="col-2">
            <div class="d-flex flex-column flex-shrink-0 p-4 bg-white" style="height: 100vh">
                <div class="menu-logo">
                    <a href="home.php" class="d-flex align-items-center">      
                        <svg class="icon d-sm-none d-lg-block" style="width: 174px; height: 57px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#logo-blue-transparent"></use>
                        </svg>

                        <svg class="icon d-sm-block d-lg-none" style="width: 174px; height: 57px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#logo-min"></use>
                        </svg>
                    </a>
                </div>
                <ul class="nav flex-column mb-auto mt-5 menu-list">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex align-items-center menu-item" aria-current="page">                
                            <svg class="icon me-3 d-block" aria-hidden="true" focusable="false">
                                    <use href="images/sprite.svg#icon-home"></use>
                            </svg>
                            <span class="d-sm-none d-lg-block">Главная</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg class="icon me-3 d-block" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#icon-task"></use>
                        </svg>
                        <span class="d-sm-none d-lg-block">Мои задачи</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg class="icon me-3 d-block" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#icon-projects"></use>
                        </svg>
                        <span class="d-sm-none d-lg-block">Проекты</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg class="icon me-3 d-block" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#icon-team"></use>
                        </svg>
                        <span class="d-sm-none d-lg-block">Команда</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg class="icon me-3 d-block" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#icon-message"></use>
                        </svg>
                        <span class="d-sm-none d-lg-block">Чат</span>
                        </a>
                    </li>
                </ul>

            <div class="active-user">
                    <a href="#" class="nav-item">
                    <svg class="icon" aria-hidden="true" focusable="false">
                            <use href="images/sprite.svg#user-blue"></use>
                        </svg>
                        <span class="menu-item ms-3"><?php echo $_COOKIE["username"]?></span>
                    </a>
            </div>
            
            </div>

        </aside>
        <div class="col-10 p-5 projects">
            <header class="bootstrap-header d-flex justify-content-between fw-bold fs-4">
                <a href="">Проекты</a>
                <time id='date'>2 марта 2022, среда</time>   
            </header>
            
            <main>
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-md-4 col-sm-12">
                            <div class="projects__card p-3 mb-4">
                                <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                                <div class="projects__card-body mt-3">
                                    <h5 class="text-info">Планируемые проекты</h5>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="projects__card p-3 mb-4">
                                <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                                <div class="projects__card-body mt-3">
                                    <h5 class="text-primary">Проекты в работе</h5>
                                </div>     
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="projects__card p-3 mb-4">
                                <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                                <div class="projects__card-body mt-3">
                                    <h5 class="text-success">Выполненные проекты</h5>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php require_once "components/footer.php"?>
