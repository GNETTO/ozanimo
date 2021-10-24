<?php
require("crud.php");
class Ventes {

    var $pdo ;
    var $crud;

    function __construct(){
        $this->pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $this->crud =  new Crud();
    }

    function addVente($sql){
        return $this->crud->create($sql, $this->pdo);
    }

    function readVente($sql){
        return $this->crud->read($sql, $this->pdo);
    }

    function updateVente($sql){
        return $this->crud->update($sql, $this->pdo);
    }

    function deleteVente($sql){
        return $this->crud->delete($sql, $this->pdo);
    }
}
