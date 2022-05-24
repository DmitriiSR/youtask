<?php

$auth = true;
setcookie("auth", $auth, time() - 2592000);
require_once 'engine/variable.php';

if ($url !== '') {
    require 'class/'.$url.'_class.php';
    $Page = new pageClass();
    echo "<script>var loadPageObj = JSON.parse(".json_encode($Page->Action()).");</script>";

    echo "
    <script>
        viewModel.filter = {};
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
                } else if (key.includes('search_')) {
                    let row = {};
                    for (let i = 0; i < obj[key].length; i++) {
                        row[obj[key][i]] = '';
                    }
                    name = key.substr(7);
                    viewModel.filter[name] = row;
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
       
        for (let key in viewModel.filter) {

            for (let i in viewModel.filter[key]) {
                viewModel.filter[key][i] = ko.observable('');
                viewModel.filter[key][i].subscribe(function (value) {
                    if(typeof value === 'undefined') {
                        value = ko.observable('');
                    }
                    search(i, key, value);
                })
            }
        }
        
    </script>
    ";
}
