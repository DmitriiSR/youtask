<?php
include 'engine/base_class.php';
require_once 'engine/variable.php';
class pageClass extends MainClass {

    function Action()
    {
        $action = array(
            "tasks" => $this->getItemsByUserId('tasks'),
            "skeleton_tasks" => $this->getSkeleton('tasks'),
            "skeleton_users" => $this->getSkeleton('users'),
            "skeleton_attachments" => $this->getSkeleton('attachments'),
            "attachments" => $this->getItemsByUserId('attachments'),
        );
        return json_encode($action);
    }
}


