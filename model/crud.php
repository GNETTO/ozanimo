<?php

class Crud {

    var $pdo ;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
    }

    function create($q){
        $this->pdo->exec($q);
        //$last_id = $conn->lastInsertId();
        return $this->pdo->lastInsertId();
    }

    function read($q ){
        $data = $this->pdo->query($q);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        return $data ;
    }

    function update($q){
        $stmt = $this->pdo->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function delete($q){
        $this->pdo->exec($q);
    }

    
}

/*class Crudprepare {
   
    function __constructor(){
       
    }

    function create($q, $this->pdo){
        $creation = 
        $this->pdo->exec($q);
        //$last_id = $conn->lastInsertId();
        return $this->pdo->lastInsertId();
    }

    function read($q, $this->pdo ){
        $data = $this->pdo->query($q);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        return $data ;
    }

    function update($q, $this->pdo){
        $stmt = $this->pdo->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function delete($q, $this->pdo){
        $this->pdo->exec($q);
    }*/