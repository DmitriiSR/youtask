<?php
include 'engine/base_class.php';
class test extends MainClass {

    function Action()
    {
        $action = array(
            "tasks" => $this->getList('tasks'),
            "tasksSkeleton" => $this->getSkeleton('tasks')
        );
        return json_encode($action);
    }

}

$test = new test();

