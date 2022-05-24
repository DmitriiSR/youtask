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
function set(str, obj, callback) {
    setObservable(str);

    if (typeof obj.id === 'function' && obj.id() === '' || typeof obj.id !== 'function' && obj.id === '') {
        viewModel[str].push(obj);
        for (let key in obj) {
            obj[key] = obj[key]();
        }
        setObj(str, obj, callback);
        for (let key in obj) {
            obj[key] = ko.observable(obj[key]);
        }
    } else {
        for (let key in viewModel[str]().find(i => i.id() === obj.id())) {
            viewModel[str]().find(i => i.id() === obj.id())[key](storage.get(str)[key]());
        }
        for (let key in storage.get(str)) {
            storage.get(str)[key] = storage.get(str)[key]();
        }
        updateNote(str, storage.get(str), callback);
        for (let key in storage.get(str)) {
            storage.get(str)[key] = ko.observable(storage.get(str)[key]);
        }
    }
    setObservable(str);
    cleanStorage(str);
}

// запрос на обновление записи в базе
function updateNote(str, data, callback) {
    data['dbname'] = str;
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'update' },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (!!callback) {
                callback(jsonData);
            }
        }
    });
}

// запрос на запись в базу
let setObj = function (str, data, callback) {
    data['dbname'] = str;
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'write' },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (!!callback) {
                callback(jsonData);
            }
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
    cleanStorage(str);
    for (let key in data) {
        if (typeof storage.get(str)[key] !== 'function') {
            storage.get(str)[key] = ko.observable(storage.get(str)[key]);
        }

        if (typeof data[key] !== 'function') {
            data[key] = ko.observable(data[key]);
        }
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

// Запрос на поиск элементов
function search(name, key, value) {
    data = { dbname: key, name: name, value: value };
    $.ajax({
        type: "POST",
        url: '/engine/requests.php',
        data: { data: data, action: 'search' },
        success: function (response) {
            var jsonData = JSON.parse(response);
            jsonData.forEach( function (elem) {
                for (let key in elem) {
                    if (typeof elem[key] !== 'function') {
                        elem[key] = ko.observable(elem[key]);
                    }
                }
            })
            viewModel[key](jsonData);
        }
    });
}

// Приведение к observable

function setObservable(str) {
    let arr = viewModel[str]();
    arr.forEach(function (elem) {
        for (let key in elem) {
            if (typeof elem[key] !== 'function') {
                elem[key] = ko.observable(elem[key]);
            }
        }
    })
    viewModel[str](arr);
}

// Обнуление storage

function cleanStorage(str) {
    // for (let key in storage.get(str)) {
    //     storage.get(str)[key] = ko.observable('');
    // }
}
