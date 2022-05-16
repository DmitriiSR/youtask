<?php
include 'engine/base_class.php';
require_once 'engine/variable.php';
class test extends MainClass {

    function Action()
    {
        $action = array(
            "tasks" => $this->getItemsByUserId('tasks'),
            "skeleton_tasks" => $this->getSkeleton('tasks'),
            "skeleton_users" => $this->getSkeleton('users')
        );
        return json_encode($action);
    }
}

$test = new test();

