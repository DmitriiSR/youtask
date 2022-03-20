
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

function getObj(data) {
    $.ajax({
        type: "GET",
        url: '/engine/getobj.php',
        data: data,
        success: function (response) {
            var jsonData = JSON.parse(response)[0];
            console.log(jsonData);
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

            console.log(jsonData);
        }
    });
}




