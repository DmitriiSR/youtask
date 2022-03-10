<?php

if (isset(array_keys($_POST)[0]) && array_keys($_POST)[0]) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
    }

    $dbname = strval(array_keys($_POST)[0]);

    $sqlquery = "SELECT * FROM `".$dbname."`";

    $table = $mysql->query($sqlquery);

    $finalarr = array();

    while ($row = $table->fetch_assoc()) {

        $tablearr = array();

        for ($i = 0; $i < count($row); $i++) {
            $key = array_keys($row)[$i];

            $tablearr[array_keys($row)[$i]] = $row[$key];
        }

        array_push($finalarr, $tablearr);
    }
echo json_encode($finalarr);
}