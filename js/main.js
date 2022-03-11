function getRows(data) {
    $.ajax({
        type: "POST",
        url: '/engine/read.php',
        data: data,
        success: function (response) {
            var jsonData = JSON.parse(response);

            console.log(jsonData);

        }
    });
}


//Вывод даты в header
let date = new Date();
let day = date.getDay();
let dayNumber = date.getDate();
let month = date.getMonth();
let year = date.getFullYear();
let months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
let days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

document.getElementById('date').innerHTML = dayNumber + ' ' + months[month] + ' ' + year + ',' + ' ' + days[day];



