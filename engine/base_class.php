<?php

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

        $selectquery = "SELECT * FROM `" . $dbname . "`";

        $table = $mysql->query($selectquery);


        while ($row = $table->fetch_assoc()) {

            $tablearr = [];

            for ($i = 0; $i < count($row); $i++) {
                $key = array_keys($row)[$i];
                $tablearr[array_keys($row)[$i]] = '';
            }
            return $tablearr;
        }
    }
    function getList($str)
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
}
