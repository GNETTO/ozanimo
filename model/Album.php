<?php
require("Crud.php");
class Album  extends Crud{

    function __construct(){
        //$this->pdo = new PDO("mysql:dbname=ozanimo; host=localhost","root","");
       // $this->crud =  new Crud();
    }
    
    function addAlbum($sql){
        return $this->create($sql);
    }

    function readAlbum($sql){
        return $this->read($sql);
    }

    function updateAlbum($sql){
        return $this->update($sql);
    }

    function deleteAlbum($sql){
        return $this->delete($sql);
    }
}