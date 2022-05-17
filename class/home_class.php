<?php
include 'engine/base_class.php';
require_once 'engine/variable.php';
class pageClass extends MainClass {

    function Action()
    {
        $action = array(

        );
        return json_encode($action);
    }
}
