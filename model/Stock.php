<?php

require("Crud.php");
class Stock  extends Crud{

    function __construct(){
        //$this->pdo = new PDO("mysql:dbname=ozanimo; host=localhost","root","");
       // $this->crud =  new Crud();
    }
    
    function addStock($sql){
        return $this->create($sql);
    }

    function readStock($sql){
        return $this->read($sql);
    }

    function updateStock($sql){
        return $this->update($sql);
    }

    function deleteStock($sql){
        return $this->delete($sql);
    }
}