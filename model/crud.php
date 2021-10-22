<?php

class Crud {
   
    function __constructor(){
       
    }

    function create($q, $connect){
        $connect->exec($q);
        //$last_id = $conn->lastInsertId();
        return $connect->lastInsertId();
    }

    function read($q, $connect ){
        $data = $connect->query($q);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        return $data ;
    }

    function update($q, $connect){
        $stmt = $connect->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function delete($q, $connect){
        $connect->exec($q);
    }
}

/*class Crudprepare {
   
    function __constructor(){
       
    }

    function create($q, $connect){
        $creation = 
        $connect->exec($q);
        //$last_id = $conn->lastInsertId();
        return $connect->lastInsertId();
    }

    function read($q, $connect ){
        $data = $connect->query($q);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        return $data ;
    }

    function update($q, $connect){
        $stmt = $connect->prepare($q);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function delete($q, $connect){
        $connect->exec($q);
    }*/