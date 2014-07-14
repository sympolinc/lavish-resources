<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SympolSelect
 *
 * @author sympol foundation
 */
req("Database");
class SympolSelect {
    private $conn;
    public $sql;
    private $tbl;
    private $select,$fields,$from,$cond;
    public $has_rows;
    public $rows;
    public $row;
    public $cursor=0;
    function __construct($connection){
        $this->conn=$connection;
        return $this;
    }
    public function select($fields=["*"]){
        $this->fields=$fields;
        return $this;
    }
    public function from($tbl){
        if(!$tbl):
            die();
        endif;
        $this->tbl=$tbl;
        return $this;
    }
    public function where($args){
        if(!$args):
            die();
        endif;
        $args = func_get_args();
        $this->cond = call_user_func_array('sprintf', $args);
        return $this;
    }
    public function all(){
        $this->sql="SELECT " . implode(', ', $this->fields) . " FROM $this->tbl";
        if($this->cond):
            $this->sql.=" WHERE $this->cond;";
        endif;
        $db=new Database($this->conn);
        $db->query($this->sql);
        $this->rows=$db->rows;
        $this->has_rows=$db->has_rows;
        return $this;
    }
    public function single(){
        $this->sql="SELECT " . implode(', ', $this->fields) . " FROM $this->tbl";
        if($this->cond):
            $this->sql.=" WHERE $this->cond;";
        endif;
        $db=new Database($this->conn);
        $db->query_single($this->sql);
        $this->rows=$db->rows;
        $this->has_rows=$db->has_rows;
        return $this;
    }
    public function scalar(){
        $this->sql="SELECT " . implode(', ', $this->fields) . " FROM $this->tbl";
        if($this->cond):
            $this->sql.=" WHERE $this->cond;";
        endif;   
        $db=new Database($this->conn);
        return $db->query_scalar($this->sql);
    }
    public function next(){
        if(!$this->has_rows):
            return false;
        endif;
        $this->row=mysqli_fetch_assoc($this->rows);
        return $this->row;
    }
}
