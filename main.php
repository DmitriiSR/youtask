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

<div data-bind="visible: viewModel.test" style="width: 300px; height: 100px; background-color: #ccc;"></div>
<button data-bind="click: () => viewModel.test(true)" style="padding: 10px; margin-top: 15px;">View</button>


<script src="js/main.js"></script>


<script>
    viewModel.test = ko.observable(false);
</script>









<script>
    let button = document.getElementById('btn');
    button.addEventListener('click', () => getObj('tasks'));

    function get() {
        let newObj = JSON.parse(JSON.stringify(window.mainObj[0]));
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

<?php require_once "components/footer.php"?>
