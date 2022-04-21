<?php

// Получение всех записей из базы
if ($_REQUEST['action'] === 'read') {
    if (isset($_REQUEST['data']) && $_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        // echo json_encode($_REQUEST['data']);

        $dbname = strval($_REQUEST['data']);

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
}

// получение структуры базы данных
if ($_REQUEST['action'] === 'getobj') {
    if (isset($_REQUEST['data']) && $_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        $dbname = strval($_REQUEST['data']);

        $selectquery = "SELECT * FROM `".$dbname."`";

        $table = $mysql->query($selectquery);


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
}

// Добавление записи в базу
if ($_REQUEST['action'] === 'write') {
    if ($_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }


        $dbname = $_REQUEST['data']['dbname'];

        $keyarr = array();
        $valuearr = array();

        for ($i = 1; $i < count($_REQUEST['data']) - 1; $i++) {
            array_push($keyarr, array_keys($_REQUEST['data'])[$i]);
        }

        for ($i = 1; $i < count($_REQUEST['data']) - 1; $i++) {
            array_push($valuearr, $_REQUEST['data'][array_keys($_REQUEST['data'])[$i]]);
        }

        $keysstring = "`" . implode("`, `", $keyarr) . "`";
        $valuestring = "'" . implode("', '", $valuearr) . "'";

        $insertquery = "INSERT INTO `" . $dbname . "`(" . $keysstring . ") VALUES (" . $valuestring . ")";


        $mysql->query($insertquery);

        echo json_encode(array('success' => 0));
    }
}

// Удаление записи из базы
if ($_REQUEST['action'] === 'delete') {
    if ($_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        $dbname = $_REQUEST['data']['dbname'];
        $id =   $_REQUEST['data']['id'];

        $deletequery = "DELETE FROM `".$dbname."` WHERE id=".$id;

        $mysql->query($deletequery);

        echo json_encode(array('success' => 0));
    }
}

// Получение записи из базы по id
if ($_REQUEST['action'] === 'getnote') {
    if ($_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        $dbname = strval($_REQUEST['data']['dbname']);
        $id =   $_REQUEST['data']['id'];

        $sqlquery = "SELECT * FROM `".$dbname."` WHERE id=".$id;

        $table = $mysql->query($sqlquery);
        echo json_encode($table->fetch_assoc());

    }
}

    // Изменение одного поля в записи
if ($_REQUEST['action'] === 'getonenote') {
    if ($_REQUEST['data']) {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        $dbname = strval($_REQUEST['data']['dbname']);
        $id = $_REQUEST['data']['id'];
        $key = $_REQUEST['data']['key'][0];
        $value = $_REQUEST['data']['value'][0];

        $sqlquery = "UPDATE `".$dbname."` SET `".$key."` = '".$value."' WHERE id=".$id;

        $mysql->query($sqlquery);
        echo json_encode($sqlquery);

    }
}