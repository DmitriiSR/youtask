<?php

$auth = true;
setcookie("auth", $auth, time() - 2592000);
require_once 'engine/variable.php';
require 'class/'.$url.'_class.php';

$Page = new test();

echo "<script>var loadPageObj = JSON.parse(".json_encode($Page->Action()).");</script>";

?>

<script>
    function parseFunc(obj) {
        for (let key in obj) {
            if (key.includes('skeleton_')) {
                name = key.substr(9);
                let row = {};
                for (let i = 0; i < obj[key].length; i++) {
                    row[obj[key][i]] = ko.observable('');
                }
                 row.userid = ko.observable(+cookieObj.userid);
                 storage.set(name, row);
            } else {
                viewModel[key] = ko.observableArray(Array.from(obj[key]));
                viewModel[key]().forEach(
                    function (i) {
                        for (let key in i) {
                            i[key] = ko.observable(i[key]);
                        }
                    }
                )
            }
        }
    }

    parseFunc(loadPageObj);

</script>
