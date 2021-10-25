<?php

require("Crud.php");

class Stock_History  extends Crud{

    function __construct(){
        //$this->pdo = new PDO("mysql:dbname=ozanimo; host=localhost","root","");
       // $this->crud =  new Crud();
    }
    
    function addStock_History($sql){
        return $this->create($sql);
    }

    function readStock_History($sql){
        return $this->read($sql);
    }

    function updateStock_History($sql){
        return $this->update($sql);
    }

    function deleteStock_History($sql){
        return $this->delete($sql);
    }
}