<?php
require_once 'engine/variable.php';
class MainClass {

    function getURL() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        return $url[0];
    }

    function getSkeleton($str)
    {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        $dbname = strval($str);

        $selectquery = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='youtask'  AND `TABLE_NAME`='".$dbname ."'";

        $table = $mysql->query($selectquery);

        $tablearr = [];
        foreach ($table as $row) {
            array_push($tablearr, $row['COLUMN_NAME']);
        }


    return $tablearr;
    }

    // Получение всех записей
    function getListAll($str)
    {
                $mysql = new mysqli("youtask", "mysql", "", "youtask");
                $mysql->query("SET NAMES 'utf8'");

                if ($mysql->connect_error) {
                    echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
                }

                // echo json_encode($_REQUEST['data']);

                $dbname = strval($str);

                $sqlquery = "SELECT * FROM `".$dbname."`";

                $table = $mysql->query($sqlquery);

                $finalarr = array();

                while ($row = $table->fetch_assoc()) {



                    for ($i = 0; $i < count($row); $i++) {
                        $key = array_keys($row)[$i];

                        $tablearr[array_keys($row)[$i]] = $row[$key];
                    }

                    array_push($finalarr, $tablearr);
                }

        return $finalarr;


            }

    // Получение записей по текущему юзеру
    function getItemsByUserId($str)
    {
        $mysql = new mysqli("youtask", "mysql", "", "youtask");
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo json_encode(array('success' => 0, 'Error Number: ' => $mysql->connect_errno, 'Error: ' => $mysql->connect_error));
        }

        // echo json_encode($_REQUEST['data']);

        $dbname = strval($str);

        $userid = $_COOKIE['userid'];
        $sqlquery = "SELECT * FROM `".$dbname."` WHERE userid=".$userid;

        $table = $mysql->query($sqlquery);

        $finalarr = array();

        while ($row = $table->fetch_assoc()) {



            for ($i = 0; $i < count($row); $i++) {
                $key = array_keys($row)[$i];

                $tablearr[array_keys($row)[$i]] = $row[$key];
            }

            array_push($finalarr, $tablearr);
        }

        return $finalarr;


    }
}
