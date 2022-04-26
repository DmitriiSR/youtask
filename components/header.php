<?php
if (!$_COOKIE['auth_user']) {
    $newurl = '';
    header('location: http://youtask/auth.php');
}

?>
<!doctype html>
<html lang="ru">
<head>
    <base href="http://youtask/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>You task</title>
</head>
<body>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src="js/knockout-3.5.1.js"></script>
<script src="js/luxon.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.ru.min.js"></script>
