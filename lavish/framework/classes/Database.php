<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author sympol foundation
 */
class Database {
    public $conn;
    public $rows;
    public $has_rows=false;
    public $row;
    function __construct($connection){
        $this->conn=$connection;
        return $this;
    }
    public function query($sql){
        $results= mysqli_query($this->conn, $sql);
        if(count($results)):
            $this->has_rows=true;
        endif;
        $this->rows=$results;
        return $this;
    }
    public function query_single($sql){
        $results= mysqli_query($this->conn, $sql);
        if(count($results)):
            $this->has_rows=true;
        endif;
        $this->rows=$results;
        $this->next();
        return $this;
    }
    public function query_scalar($sql,$field){
        $this->query_single($sql);
        if($this->has_rows):
            return $this->row[$field];
        endif;
    }
    public function exec($sql){
        $results= mysqli_query($this->conn, $sql);
        return count($results);
    }
    public function next(){
        if(!$this->has_rows):
            return false;
        endif;
        $this->row=mysqli_fetch_assoc($this->rows);
        return !!$this->row;
    }
}
