<?php


class table_creator {
    private $query;
    private $data;

    function __construct($query)
    {
        $this->query = $query;
    }

    function run_query ()
    {
        require_once "sqlQuery.php";
        $this->data = sqlexec($this->query);
        return ($this->data);
    }
    function gen_table()
    {


    }

    function genTable($query){

        echo "<table class=\"table table-hover\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope=\"col\">#</th>" ;
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "ROW HERE";
        echo "<tr>";
        echo "<th scope=\"row\">1</th>";
        echo "<td>Mark</td>" ;
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";


    }


}   $x = new table_creator("SELECT * from pyover_users");
    echo array_keys($x->run_query()[0])[0];