<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SympolDbInfo
 *
 * @author sympol foundation
 */
class SympolDbInfo {
    //put your code here
    private $conn;
    public $tables;
    public $table_info;
    function __construct($connection){
        $this->conn=$connection;
        req("Database");
        $db=new Database($this->conn);
        $sql="SHOW TABLES;";
        $db->query($sql);
        $this->tables=array();
        while($db->next() && $row=$db->row):
            $this->tables[]=$row[key($row)]; 
        endwhile;
        $this->table_info=array();
        foreach($this->tables as $tbl):
            $sql="SHOW COLUMNS IN $tbl;";
            $db->query($sql);
            $this->table_info[$tbl]=array();
            while($db->next() && $row =$db->row):
                var_dump($row);
            echo "<br/>";
            endwhile;
        echo "<br/>";
        echo "<br/>";
        endforeach;
    }
}
