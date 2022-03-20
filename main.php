<?php require_once "components/header.php"?>
<script src="js/main.js"></script>
<script>
    // function getDB() {
    //     for (let i = 0; i < arguments.length; i++) {
    //         mainObj[arguments[i]] = getRows(arguments[i], );
    //     }
    // }
    window.onload = function() {
        getDB('tasks', 'users');
    }
</script>

<button class="btn btn-primary alpha">Подтвердить</button>
<button class="btn btn-secondary">Подтвердить</button>



<!--<script>-->
<!--    viewModel.test = ko.observable(false);-->
<!--</script>-->
<!--<script>-->
<!--    let button = document.getElementById('btn');-->
<!--    button.addEventListener('click', () => getObj('tasks'));-->
<!---->
<!--    function get() {-->
<!--        let newObj = JSON.parse(JSON.stringify(window.mainObj[0]));-->
<!--        newObj.taskdate = '05.01.1990';-->
<!--        newObj.tasktext = 'test';-->
<!--        newObj.tasktime = '10:10';-->
<!--        newObj.tasktitle = 'test';-->
<!--        newObj.userid = '4';-->
<!--        return newObj;-->
<!--    }-->
<!---->
<!--    let button2 = document.getElementById('btn2');-->
<!---->
<!--    button2.addEventListener('click',() => setObj(get()));-->
<!---->
<!--</script>-->
<!---->
<?php //require_once "components/footer.php"?>
