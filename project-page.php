<?php require_once "components/header.php"?>
<?php
$auth = true;
setcookie("auth", $auth, time() - 2592000);
?>

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
                    <div class="projects__card p-3 mb-4 shadow rounded-3">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-info">Планируемые проекты</h5>
                        </div> 
                    </div>
                </div>

                <div class="col-xxl-3 col-md-4 col-sm-12">
                    <div class="projects__card p-3 mb-4 shadow rounded-3">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-primary">Проекты в работе</h5>
                        </div>     
                    </div>
                </div>

                <div class="col-xxl-3 col-md-4 col-sm-12">
                    <div class="projects__card p-3 mb-4 shadow rounded-3">
                        <img src="images/home/overdue-tasks-background.png" alt="" class="img-fluid">
                        <div class="projects__card-body mt-3">
                            <h5 class="text-success">Выполненные проекты</h5>
                        </div>    
                    </div>
                </div>
            
        </div>
    </div>
</div>

<?php require_once "components/footer.php"?>
