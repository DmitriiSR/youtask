var DateTime = luxon.DateTime;

let cookieObj = {};
let cookies = document.cookie.split('; ');
for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i].split(/=/);
    cookieObj[cookie[0]] = cookie[1];
}

if ('viewModel' in window) {
} else {
    viewModel = {};
}


const storage = new Map();

function setDbInViewModel() {
    for (let i = 0; i < arguments.length; i++) {
        viewModel[arguments[i]] = ko.observableArray([]);
    }
}

function getDB() {
    let argObj = arguments;
    for (let i = 0; i < argObj.length; i++) {
        $.ajax({
            type: "POST",
            url: '/engine/requests.php',
            data: { data: argObj[i], action: 'read' },
            success: function (response) {
                var jsonData = JSON.parse(response);
                viewModel[argObj[i]](Array.from(jsonData));
            }
        });
    }
}

function newObj(name) {
    let row = {};
    let obj = viewModel[name]();
    for (let key in obj[0]) {
        row[key] = ko.observable('');
    }
    row.dbname = name;
    row.id = '';
    row.userid = +cookieObj.userid;
    storage.set(name, row);
}

function set(obj) {
    let row = {};
    for (let key in obj) {
        row[key] = obj[key]
        if (typeof row[key] === "function") {
            row[key] = row[key]();
        }
    }
    viewModel[obj.dbname].push(obj);
    setObj(row);
}

function getObj(data) {
    $.ajax({
        type: "GET",
        url: '/engine/requests.php',
        data: { data: data, action: 'getobj' },
        success: function (response) {
            var jsonData = JSON.parse(response)[0];
        }
    });
}

let setObj = function (data) {
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'write' },
        success: function (response) {
            var jsonData = JSON.parse(response);
        }
    });
}

function remove(db, id) {
    arr = viewModel[db]()
    data = { dbname: db, id: id };
    index = viewModel[db]().findIndex(i => i.id === id);
    viewModel[db].splice(index, 1);
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'delete' },
        success: function (response) {
            var jsonData = JSON.parse(response);
        }
    });
}

function clearForm() {
    let inputParentArr = document.querySelectorAll(".inputs-to-clear");

    inputParentArr.forEach((item) => {
        let inputArr = item.querySelectorAll("input");
        inputArr.forEach((item) => {
            item.value = "";
        })
    })
}

function editOneField(db, id, obj) {
    data = { dbname: db, id: id, key: Object.keys(obj), value: Object.values(obj) };
    index = viewModel[db]().findIndex(i => i.id === id);
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'getonenote' },
        success: function (response) {
            var jsonData = JSON.parse(response);
        }
    });
}
