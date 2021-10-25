<?php

require("Crud.php");
class Item_Info  extends Crud{

    function __construct(){
        //$this->pdo = new PDO("mysql:dbname=ozanimo; host=localhost","root","");
       // $this->crud =  new Crud();
    }
    
    function addItem_Info($sql){
        return $this->create($sql);
    }

    function readItem_Info($sql){
        return $this->read($sql);
    }

    function updateItem_Info($sql){
        return $this->update($sql);
    }

    function deleteItem_Info($sql){
        return $this->delete($sql);
    }
}