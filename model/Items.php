<?php
require("Crud.php");
class Item  extends Crud{

    function __construct(){
        //$this->pdo = new PDO("mysql:dbname=ozanimo; host=localhost","root","");
       // $this->crud =  new Crud();
    }
    
    function addItem($sql){
        return $this->create($sql);
    }

    function readItem($sql){
        return $this->read($sql);
    }

    function updateItem($sql){
        return $this->update($sql);
    }

    function deleteItem($sql){
        return $this->delete($sql);
    }
}