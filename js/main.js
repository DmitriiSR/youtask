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


setDbInViewModel('tasks');
getDB('tasks');
const storage = new Map();

function setDbInViewModel () {
    for (let i = 0; i < arguments.length; i++) {
        viewModel[arguments[i]] = ko.observableArray([]);
    }
}

function getDB () {
    let argObj = arguments;
    for (let i = 0; i < argObj.length; i++) {
        $.ajax({
            type: "POST",
            url: '/engine/read.php',
            data: argObj[i],
            success: function(response)
            {
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
        if(typeof row[key] === "function") {
            row[key] = row[key]();
        }
    }
    viewModel[obj.dbname].push(obj);
    setObj(row);
}

function getObj(data) {
    $.ajax({
        type: "GET",
        url: '/engine/getobj.php',
        data: data,
        success: function (response) {
            var jsonData = JSON.parse(response)[0];
        }
    });
}

let setObj = function (data) {
    $.ajax({
        type: "POST",
        url: '/engine/write.php',
        data: data,
        success: function(response)
        {
            var jsonData = JSON.parse(response);
        }
    });
}




