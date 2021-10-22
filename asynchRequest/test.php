<?php
echo $_SERVER['DOCUMENT_ROOT'];
/*if(isset($_FILES['file']['name'])){

   // Getting file name 
   $filename = $_FILES['file']['name'];
   
   //Location 
   $location = "../upload/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   // Valid extensions 
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   // Check file extension 
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      //Upload file 
      if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
         $response = $location;
      }
     
   }

   echo "response";
  
   exit;
}else{
    echo "data ia";
}
*/
/*
require("../class/crud.php");


$crud = new Crud();
$pdo ="";

try{
    $pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
}catch (Exception $e){
    
    echo "connexion a la base donnée a echoué";
}


// CREATE CHIEN
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['btn_ajouter_chien'])){
    
    $nom_chien      = htmlspecialchars($_GET['nom_chien']);
    $race_chien     = htmlspecialchars($_GET['race_chien']);
    $poids_chien    = htmlspecialchars($_GET['poids_chien']);
    $age_chien      = htmlspecialchars($_GET['age_chien']);
    $prix_chien     = htmlspecialchars($_GET['prix_chien']);
    $genre_chien    = htmlspecialchars($_GET['genre_chien']);
    $taille_chien   = htmlspecialchars($_GET['taille_chien']);
    $fourure_chien  = htmlspecialchars($_GET['fourure_chien']);
    $cat_chien      = htmlspecialchars($_GET['cat_chien']);
    $file_chien     = htmlspecialchars($_GET['file_chien']);
    $ajouter_chien  = htmlspecialchars($_GET['btn_ajouter_chien']);

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO animals VALUES (null, '".$nom_chien."', '".$genre_chien."', '".$race_chien."','".$poids_chien."','".$age_chien."','".$prix_chien."','".$taille_chien."','".$fourure_chien."','".$cat_chien."','chien','abc')";      
        $id = $crud->create($sql, $pdo);
        if($id !=null  ) {
            echo $id ;
        }else{
            echo -1 ;
        } 

    }catch(Exception $e){
        //echo $e;
        echo -1;
    }   
   
}
  

//DISPLAY ALL ANIMAL ON TABLE
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['readAnimal'])){
    try {
        $sql = "SELECT * FROM animals";
        $animals = $crud->read($sql, $pdo);
        //$animals->setFetchMode(PDO::FETCH_ASSOC);
        $table ="";
          
        $table="
                  <table class='table table-striped table-sm' id='tab_animaux'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nom</th>
                            <th scope='col'>Age</th>
                             <th scope='col'>Sex</th>
                            <th scope='col'>Taille(m)</th>
                            <th scope='col'>Poids(Kg)</th>
                            <th scope='col'>Prix</th>
                            <th scope='col'>Categorie</th>
                            <th scope='col'>Type</th>
                            <th scope='col'>plus</th>
                            <th scope='col'>ajouter</th>
                            <th scope='col'>modifier</th>
                            <th scope='col'>suprimer</th>
                           
                        </tr>
                    </thead>
                    <tbody>";
        while($row = $animals->fetch()){
            $table = $table . 
                        "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['nom_animal']."</td>
                            <td>".$row['age_animal']."</td>
                            <td>".$row['genre_animal']."</td>
                            <td>".$row['taille_animal']."</td>
                            <td>".$row['poids_animal']."</td>
                            <td>".$row['prix_animal']."</td>
                            <td>".$row['cat_animal']."r</td>
                            <td>".$row['type_animal']."</td>
                            <td> <button class='btn btn-primary btn-sm btn-action' data-idanimal='".$row['id']."' data-action='1' > ... </button></td>
                            <td><button  class='btn btn-light btn-sm btn-action'  data-idanimal='".$row['id']."' data-action='0'> + </button></td>
                            <td><button class='btn btn-success btn-sm btn-action' data-idanimal='".$row['id']."' data-action='2'> * </button></td>
                            <td><button class='btn btn-danger btn-sm btn-action' data-idanimal='".$row['id']."' data-action='3'> - </button></td>
                        </tr>";
        }
        $table = $table . "</tbody></body>";
        echo $table;
        //code...
    } catch (Exception $e) {
        //throw $th;
        echo -1 ;
    }
}


// DISPLAY ONE ANIMAL =
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['crud_id'])) {

    $id = htmlspecialchars($_GET['crud_id']);
    try {
        $pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();

        $sql = "SELECT * FROM animals where id='".$id."'" ;
        $animal = $crud->read($sql, $pdo);

        $one_animal =array(); 
        while($row = $animal->fetch()){ 
            array_push($one_animal,$row);
        }

        $pdo =null ;
        echo  json_encode($one_animal) ;
        //echo $one_animal;
    } 
    catch(Exception $e){
        echo $e ;
    }
}


// UPDATE ON ANIMAL = chien
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['btn_modifier_chien'])) {
    $nom_chien      = htmlspecialchars($_GET['nom_chien']);
    $race_chien     = htmlspecialchars($_GET['race_chien']);
    $poids_chien    = htmlspecialchars($_GET['poids_chien']);
    $age_chien      = htmlspecialchars($_GET['age_chien']);
    $prix_chien     = htmlspecialchars($_GET['prix_chien']);
    $genre_chien    = htmlspecialchars($_GET['genre_chien']);
    $taille_chien   = htmlspecialchars($_GET['taille_chien']);
    $fourure_chien  = htmlspecialchars($_GET['fourure_chien']);
    $cat_chien      = htmlspecialchars($_GET['cat_chien']);
    $file_chien     = htmlspecialchars($_GET['file_chien']);
    $ajouter_chien  = htmlspecialchars($_GET['btn_modifier_chien']);
    /*$row['id']."</td>
                            <td>".$row['nom_animal']."</td>
                            <td>".$row['age_animal']."</td>
                            <td>".$row['genre_animal']."</td>
                            <td>".$row['taille_animal']."</td>
                            <td>".$row['poids_animal']."</td>
                            <td>".$row['prix_animal']."</td>
                            <td>".$row['cat_animal']."r</td>
                            <td>".$row['type_animal'] */
    
?>
 
