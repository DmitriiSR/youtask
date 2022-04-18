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
            <div class="row d-flex justify-content-center">
                <?php require_once "components/header-row.php"?>

                <div class="col-xxl-8 col-lg-12 taskss">
                    <div class="mytasks__inner card mt-5 p-3 shadow rounded-3 bg-white d-flex flex-column" style="height: 606px; min-width: 300px;">
                        <img src="images/mytasks/mytasks-block-background.png" alt="" class="card-img-top">
                        <div class="mytasks__inner-header d-flex justify-content-between mt-3 fs-5" style="color: var(--color1);">
                            <p>Задачи</p>
                            <p id="tasksFilterBtn" data-bind="click: function () {viewModel.popupVisible(!viewModel.popupVisible())}" style="cursor: pointer;">Все задачи <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg></p>

                                <div class="mytasks__filter p-3 shadow rounded-3 bg-white position-absolute top-20 end-0" id="taskFilterPopup" data-bind="visible: viewModel.popupVisible">
                                    <div class="row">
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-file-earmark me-3" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                        </svg>Все задачи</a>
                                    </div>
                                    <div class="row">
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle me-3" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                        </svg>Выполненные задачи</a>
                                    </div>
                                    <div class="row">
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-stopwatch me-3" viewBox="0 0 16 16">
                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                        </svg>Просроченные задачи</a>
                                    </div>
                                </div>
                                
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    newObj('tasks');
    viewModel.popupVisible = ko.observable(false);

    $(document).click(function (e) {
                let popup = $('#taskFilterPopup');
                let btn = $('#tasksFilterBtn');

                if ( ! btn.is(e.target) && btn.has(e.target).length === 0 &&
                    ! popup.is(e.target) && popup.has(e.target).length === 0
                ) {
                    viewModel.popupVisible(false);
                }
            });

</script>

<?php require_once "components/footer.php"?>