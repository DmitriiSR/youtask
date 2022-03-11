<?php
if (isset(array_keys($_GET)[0]) && array_keys($_GET)[0]) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
    }

    $dbname = strval(array_keys($_GET)[0]);

    $selectquery = "SELECT * FROM `".$dbname."`";

    $table = $mysql->query($selectquery);

    $finalarr = array();

    while ($row = $table->fetch_assoc()) {

        $tablearr = array($dbname);

        for ($i = 0; $i < count($row); $i++) {
            $key = array_keys($row)[$i];
            $tablearr[array_keys($row)[$i]] = '';
        }
        echo json_encode(array($tablearr));
        break;
    }
}