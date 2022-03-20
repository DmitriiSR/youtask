<script>
    let date = new Date();
    let day = date.getDay();
    let dayNumber = date.getDate();
    let month = date.getMonth();
    let year = date.getFullYear();
    let months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
    let days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    console.log(dayNumber);

    document.getElementById('date').innerHTML = dayNumber + ' ' + months[month] + ' ' + year + ',' + ' ' + days[day];
</script>
<script>
    ko.applyBindings(viewModel);
</script>
</body>
</html>