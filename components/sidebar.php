<aside class="menu">
        <svg class="icon" style="width: 174px; height: 57px; margin-bottom: 98px; padding-left: 38px;" aria-hidden="true" focusable="false">
            <use href="images/sprite.svg#logo-blue-transparent"></use>
        </svg>
        <nav class="menu__navigation">
        <ul class="menu__list">
            <li class="is-marked">
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-home"></use>
                    </svg>
                    <span>Главная</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-task"></use>
                    </svg>
                    <span>Мои задачи</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-projects"></use>
                    </svg>
                    <span>Проекты</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-team"></use>
                    </svg>
                    <span>Команда</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-notifications"></use>
                    </svg>
                    <span>Уведомления</span>
                </a>
            </li>
            <li>
                <a href="">
                    <svg class="icon" aria-hidden="true" focusable="false">
                        <use href="images/sprite.svg#icon-message"></use>
                    </svg>
                    <span>Чат</span> 
                </a>
            </li>
        </ul>
        </nav>
        <div class="menu__active-user">
            <a href="">
            <svg class="icon" style="width:27px; height: 27px; margin-right: 11px;" aria-hidden="true" focusable="false">
                    <use href="images/sprite.svg#user-blue"></use>
                </svg>
                <span><?php echo $_COOKIE["username"]?></span>
            </a>
        </div>
    </aside>