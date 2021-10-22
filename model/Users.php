<?php
require("crud.php");
class Users {

    var $pdo ;
    var $crud;

    function __construct(){
        $this->pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $this->crud =  new Crud();
    }

    function addUser($sql){
        return $this->crud->create($sql, $this->pdo);
    }

    function readUser($sql){
        return $this->crud->read($sql, $this->pdo);
    }

    function updateUser($sql){
        return $this->crud->update($sql, $this->pdo);
    }

    function deleteUser($sql){
        return $this->crud->delete($sql, $this->pdo);
    }
}

// 180 270