<?php
include 'engine/base_class.php';
require_once 'engine/variable.php';
class test extends MainClass {

    function Action()
    {
        $action = array(
            "tasks" => $this->getItemsByUserId('tasks'),
        );
        return json_encode($action);
    }
}

$test = new test();