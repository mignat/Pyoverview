<?php


class table_creator
{
    private $query;
    private $data;
    private $option_menu;
    private $option_entries;
    private $line_numbers;

    function __construct($query,$option_menu=false,$line_numbers=false)
    {
        $this->query = $query;
        $this->option_menu = $option_menu;
        $this->line_numbers = $line_numbers;
    }

    function run_query()
    {
        require_once "sqlQuery.php";
        $this->data = sqlexec($this->query);
        return ($this->data);
    }

    function addOption($option){
        $this->option_entries[] = $option;
    }

    function genTable()
    {
        $this->run_query();

        if ($this->data != "") {
            $data = $this->data;
            $raw_collums = array_keys($data[0]);
            $collumns = array();

            echo "<table class=\"table table-hover align-content-center\" align=\"center\">";
            echo "<thead class=\"thead-dark\">";
            echo "<tr>";
            foreach ($raw_collums as $col) {
                if (!is_numeric($col)) {
                    echo "<th scope=\"col\">$col</th>";
                    $collumns[] = $col;
                }
            }
            if ($this->option_menu) {
                echo "<th scope=\"col\">OPTIONS</th>";
            }

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($data as $row) {
                echo "<tr scope=\"row\">";
                foreach ($collumns as $tdcol) {
                    echo "<td>$row[$tdcol]</td>";
                }
                if ($this->option_menu) {
                    echo "<td>";
                    echo "<div class='btn-group'>";
                    foreach ($this->option_entries as $item) {
                        echo str_replace("%id%", $row[0], $item);
                    }
                    echo "</div>";
                }
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {

            echo "<table class=\"table table-hover align-content-center\" align=\"center\">";
            echo "<thead class=\"thead-dark\">";
            echo "<tr>";
            echo "<td><th scope='col'style='background: red'>ERROR</th> </td>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr scope=\"row\">";
            echo "<td>SQL Query Error or Empty Result</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }

    }


}

//$x = new table_creator("SELECT `username` AS `USERNAME`,`full_name` AS `NAME`,`privileges` AS `PRIVILEGES` FROM `pyover_users` WHERE 1",true);
///$x->run_query();
//$x->addOption("<button>%id%</button>");
//$x->genTable();