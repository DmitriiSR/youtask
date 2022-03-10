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


