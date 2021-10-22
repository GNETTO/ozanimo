<?php
require("crud.php");
class Oiseau {

    var $pdo ;
    var $crud;
    function __construct(){
        $this->pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $this->crud =  new Crud();
    }
    
    function addOiseau($sql){
        return $this->crud->create($sql, $this->pdo);
    }

    function readOiseau($sql){
        return $this->crud->read($sql, $this->pdo);
    }

    function updateOiseau($sql){
        return $this->crud->update($sql, $this->pdo);
    }

    function deleteOiseau($sql){
        return $this->crud->delete($sql, $this->pdo);
    }
}