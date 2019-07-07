<?php


class table_creator {
    private $query;
    private $data;

    function __construct($query)
    {
        $this->query = $query;
    }

    function run_query () {
        require_once "sqlQuery.php";

        $this->data = sqlexec($this->query);
        echo $this->data;



    }

}