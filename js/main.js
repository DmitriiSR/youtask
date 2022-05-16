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

// Создание слепка записи
function newObj(name) {
    let row = {};
    for (let key in viewModel[name]()[0]) {
        row[key] = ko.observable('');
    }
    row.userid = ko.observable(+cookieObj.userid);
    storage.set(name, row);
}

function createNew(str) {
    for (let key in storage.get(str)) {
        if (typeof storage.get(str)[key] === 'function') {
            if (key !== 'userid') {
                storage.get(str)[key]('');
            }
        } else {
            if (key !== 'userid') {
                storage.get(str)[key] = '';
            }
        }
    }
}

// Запись в базу
function set(str, obj) {
    if (typeof obj.id === 'function' && obj.id() === '' || typeof obj.id !== 'function' && obj.id === '') {
        viewModel[str].push(obj);

        for ( let key in obj) {
            obj[key] = obj[key]();
        }
        setObj(str, obj);
    } else {
        for (let key in viewModel[str]().find(i => i.id() === obj.id())) {
            viewModel[str]().find(i => i.id() === obj.id())[key](storage.get(str)[key]());
        }

        for ( let key in storage.get(str)) {
            storage.get(str)[key] = storage.get(str)[key]();
        }
        updateNote(str, storage.get(str))
    }

}

// запрос на обновление записи в базе
function updateNote(str, data) {
    data['dbname'] = str;
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'update' },
        success: function (response) {
            var jsonData = JSON.parse(response);
        }
    });
}

// запрос на запись в базу
let setObj = function (str, data) {
    data['dbname'] = str;
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'write' },
        success: function (response) {
            var jsonData = JSON.parse(response);
        }
    });
}

// Удаление записи из вьюхи и базы
function remove(db, id) {
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

function setData(str, data) {

    for (let key in data) {
        storage.get(str)[key](data[key]());
    }


}

// Очистка полей форм
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

// Получение айди из строки URL
function getIdFromUrl() {
    let urlArr = window.location.href.split('/');
    let gettedId = urlArr.pop();
    return +gettedId;
}
