<?php
require("crud.php");
class Chien {

    var $pdo ;
    var $crud;
    function __construct(){
        $this->pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $this->crud =  new Crud();
    }
    
    function addChien($sql){
        return $this->crud->create($sql, $this->pdo);
    }

    function readChien($sql){
        return $this->crud->read($sql, $this->pdo);
    }

    function updateChien($sql){
        return $this->crud->update($sql, $this->pdo);
    }

    function deleteChien($sql){
        return $this->crud->delete($sql, $this->pdo);
    }
}