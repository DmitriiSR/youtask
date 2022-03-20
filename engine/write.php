<?php
if ($_POST) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
    }

    $dbname = $_POST['dbname'];

    $keyarr = array();
    $valuearr = array();

    for ($i = 1; $i < count($_POST) - 1; $i++) {
        array_push($keyarr, array_keys($_POST)[$i]);
    }

    for ($i = 1; $i < count($_POST) - 1; $i++) {
        array_push($valuearr, $_POST[array_keys($_POST)[$i]]);
    }

    $keysstring = "`".implode("`, `", $keyarr)."`";
    $valuestring = "'".implode("', '", $valuearr)."'";

    $insertquery = "INSERT INTO `".$dbname."`(".$keysstring.") VALUES (".$valuestring.")";


    $mysql -> query($insertquery);

    echo json_encode(array('success' => 0));
}