<?php require_once "components/header.php"?>
<script>
    if (!window.mainObj) {
        window.mainObj = [];
    }
    window.onload = function() {
        getObj('tasks');
    }
</script>

<button id="btn">test</button>
<button id="btn2" style="margin: 20px">записать</button>

<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src="js/main.js"></script>
<script>
    let button = document.getElementById('btn');
    button.addEventListener('click', () => getObj('tasks'));

    function get() {
        let newObj = JSON.parse(JSON.stringify(window.mainObj[0]));
        document.getElementById('text').innerText = newObj;
        newObj.taskdate = '05.01.1990';
        newObj.tasktext = 'test';
        newObj.tasktime = '10:10';
        newObj.tasktitle = 'test';
        newObj.userid = '4';
        return newObj;
    }

    let button2 = document.getElementById('btn2');

    button2.addEventListener('click',() => setObj(get()));

</script>
</body>
</html>
