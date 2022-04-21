<div class="sidebar col-2 position-fixed">
        <div class="d-flex flex-column p-3 bg-white shadow" style="height: 100vh; min-width: 70px;">
                <div class="menu-logo">
                    <a href="home.php" class="d-flex align-items-center flex-shrink-0">      
                        <svg class="icon d-none d-lg-block" style="width: 174px; height: 57px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#logo-blue-transparent"></use>
                        </svg>

                        <svg class="icon d-sm-block d-lg-none" style="width: 174px; height: 57px;" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#logo-min"></use>
                        </svg>
                    </a>
                </div>

                <ul class="nav nav-pills flex-column mb-auto mt-5 menu-list">
                    <li class="nav-item mb-2">
                        <a data-bind="css: {'active': (viewModel.linkIndicator === 'home')}" href="home.php" class="nav-link d-flex align-items-center menu-item" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-house me-3 flex-shrink-0" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                            <span class="d-none d-md-block">Главная</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a data-bind="css: {'active': (viewModel.linkIndicator === 'myTasks')}" href="mytasks.php" class="nav-link d-flex menu-item" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-file-earmark-plus me-3 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        </svg>
                        <span class="d-none d-md-block">Мои задачи</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a data-bind="css: {'active': (viewModel.linkIndicator === 'projects')}" href="projects.php" class="nav-link d-flex menu-item" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-briefcase me-3 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <span class="d-none d-md-block">Проекты</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-people me-3 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg>
                        <span class="d-none d-md-block">Команда</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link d-flex menu-item" aria-current="page">                
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-bell me-3 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                        <span class="d-none d-md-block">Чат</span>
                        </a>
                    </li>
                </ul>

                <div class="active-user">
                    <a href="#" class="nav-item d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-circle me-3 flex-shrink-0 d-block" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                        <span class="menu-item ms-3 d-none d-md-block"><?php echo $_COOKIE["username"]?></span>
                    </a>
                </div>
        </div>
    </div>