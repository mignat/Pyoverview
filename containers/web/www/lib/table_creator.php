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

    function genTable(){

        if ($this->data != "") {
            $collums = array_keys($this->data[0]);



            echo "<table class=\"table table-hover\">";
            echo "<thead>";
            echo "<tr>";
            foreach ($collums as $col){
                echo "<th scope=\"col\">$col</th>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "ROW HERE";
            echo "<tr>";
            echo "<th scope=\"row\">1</th>";
            echo "<td>Mark</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }else{

            echo "Missing Query !";
        }

    }


}   $x = new table_creator("SELECT * from pyover_users");
    $x->genTable();