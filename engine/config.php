<?php

$auth = true;
setcookie("auth", $auth, time() - 2592000);

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
$url = mb_substr($url, 1, -4);;

require 'class/'.$url.'_class.php';

$Page = new test();

echo "<script>var loadPageObj = JSON.parse(".json_encode($test->Action()).");</script>";

?>

<script>
    function parseFunc(obj) {
        for (let key in obj) {
            if(typeof obj[key] === "object") {
                viewModel[key] = ko.observable(obj[key]);
            }
            if(typeof obj[key] === "array") {
                viewModel[key] = ko.observableArray(obj[key]);
            }
        }
    }
    parseFunc(loadPageObj);
</script>
