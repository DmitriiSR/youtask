

function getRows(data) {
    $.ajax({
        type: "POST",
        url: '/engine/read.php',
        data: data,
        success: function(response)
        {
            var jsonData = JSON.parse(response);

            console.log(jsonData);

        }
    });
}



function getObj(data) {
    $.ajax({
        type: "GET",
        url: '/engine/getobj.php',
        data: data,
        success: function (response) {
            var jsonData = JSON.parse(response)[0];
            window.mainObj.push(jsonData);
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


