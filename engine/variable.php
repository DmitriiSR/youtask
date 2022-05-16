<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
$url = mb_substr($url, 1, -4);

