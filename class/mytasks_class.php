<?php
include 'engine/base_class.php';
require_once 'engine/variable.php';
class pageClass extends MainClass {

    function Action()
    {
        $action = array(
            "tasks" => $this->getItemsByUserId('tasks'), // Получение списка записей из таблицы. Все записи будут лежать во viewModel.('название, которое было в двойных кавычках')
            "skeleton_tasks" => $this->getSkeleton('tasks'), // Получение структуры записи. Струкутра будет лежать в виде объекта с пустыми св-ми, во viewModel.skeleton_tasks.
            "search_tasks" => $this->setSearching('tasks'), // Аналогично getSkeleton и создает объект viewnModel.search_tasks, кот-й исп-ся при поиске
            "tasks_categories" => $this->getItemsByUserId('tasks_categories'),
            "skeleton_tasks_categories" => $this->getSkeleton('tasks_categories'),
            "search_tasks_categories" => $this->setSearching('tasks_categories'),
        );
        return json_encode($action);
    }
}
