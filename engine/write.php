<?php
if ($_POST) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
    }

    $dbname = $_POST[0];

    $keyarr = array();
    $valuearr = array();

    for ($i = 2; $i < count($_POST); $i++) {
        array_push($keyarr, array_keys($_POST)[$i]);
    }

    for ($i = 2; $i < count($_POST); $i++) {
        array_push($valuearr, $_POST[array_keys($_POST)[$i]]);
    }

    $keysstring = "`".implode("`, `", $keyarr)."`";
    $valuestring = "'".implode("', '", $valuearr)."'";

    $insertquery = "INSERT INTO `".$dbname."`(".$keysstring.") VALUES (".$valuestring.")";

    $mysql -> query($insertquery);


}