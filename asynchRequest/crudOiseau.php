<?php
require("../class/crud.php");


$crud = new Crud();
$pdo ="";

try{
    $pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
}catch (Exception $e){
    
    echo "connexion a la base donnée a echoué";
}

//OISEAU oiseau : ajout
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_ajouter_oiseau'])){
    
    $nom_oiseau      = htmlspecialchars($_POST['nom_oiseau']);
    //$age_oiseau      = htmlspecialchars($_POST['age_oiseau']);
    $prix_oiseau     = htmlspecialchars($_POST['prix_oiseau']);
    $genre_oiseau    = htmlspecialchars($_POST['genre_oiseau']);
    $bruit_oiseau  = htmlspecialchars($_POST['bruit_oiseau']);
    $cat_oiseau      = htmlspecialchars($_POST['cat_oiseau']);
    $desc_oiseau      = htmlspecialchars($_POST['desc_oiseau']);
    //$file_oiseau     = htmlspecialchars($_POST['file_oiseau']);
    $ajouter_oiseau  = htmlspecialchars($_POST['btn_ajouter_oiseau']);

    try {

        $response = "";

        if(isset($_FILES['file_oiseau']['name'])){

                $filename = $_FILES['file_oiseau']['name'];
        
                /* Location */
                $location = "../upload/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
            
                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");
            
                
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file_oiseau']['tmp_name'], $location)){
                        $location = "upload/".$filename;
                        $response = $location;
                    }
                
                }
        }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO oiseau VALUES (null, 
                '".$nom_oiseau."', 
                
                '".$genre_oiseau."', 
                '".$prix_oiseau."',
                '".$cat_oiseau."', 
                '".$bruit_oiseau."',
                '".$desc_oiseau."',
                0
            
        )";  
        
        
        $id = $crud->create($sql, $pdo);
        if($id !=null  ) {
            $sql = "INSERT INTO album VALUES (
               null,
              'photo', 
              '".date("Y-m-d")."',
              '".$response."',
                '".$id."',
                NULL,
              NULL,
              1
            )";   
            $id = $crud->create($sql, $pdo);
            
        }else{
            echo -1 ;
        } 

    }catch(Exception $e){
        //echo $e;
        echo -1;
    }   
   
}
  

//DISPLAY ALL oiseau  ON TABLE
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['readOiseau'])){
    try {
        $sql = "SELECT * FROM oiseau";
        $animals = $crud->read($sql, $pdo);
        //$animals->setFetchMode(PDO::FETCH_ASSOC);
        $table ="";
          
        $table="
                  <table class='table table-striped table-sm' id='tab_oiseau'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nom</th>
                            <th scope='col'>genre</th>
                             <th scope='col'>Prix</th>
                            <th scope='col'>Cat</th>
                            <th scope='col'>Bruit</th>
                           
                            
                            
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
                            <td>".$row['nom']."</td>
                            <td>".$row['genre']."</td>
                            <td>".$row['prix']."</td>
                            <td>".$row['cat']."r</td>
                            <td>".$row['bruit']."r</td>
                            <td> <button class='btn btn-primary btn-sm btn-action-o' data-idanimal='".$row['id']."' data-action='0' > ... </button></td>
                            <td><button  class='btn btn-light btn-sm btn-action-o'  data-idanimal='".$row['id']."'  data-action='1'> + </button></td>
                            <td><button class='btn btn-success btn-sm btn-action-o' data-idanimal='".$row['id']."'  data-action='2'> * </button></td>
                            <td><button class='btn btn-danger btn-sm btn-action-o' data-idanimal='".$row['id']."'   data-action='3'> - </button></td>
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
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['readOne'])) {

    $id = htmlspecialchars($_GET['readOne']);
    try {
        $pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();

        $sql1 = "SELECT oiseau.id as 'idoiseau', nom ,  prix, genre, cat, bruit, descs, album.id as 'idalbum', dte, paths, oiseau, accessoire,profils FROM  oiseau, album  where  oiseau.id = album.oiseau and  album.profils = 1 and oiseau.id = '".$id."'";
        $animal = $crud->read($sql1, $pdo);
        
        /*$sql2 = "SELECT * FROM  album where oiseau='".$id."' and profile=1 " ;
        $photo = $crud->read($sql2, $pdo);*/

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


// UPDATE ON ANIMAL = oiseau
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_modifier_oiseau'])) {
    //$id_oiseau      = htmlspecialchars($_POST['id_oiseau']);
    $nom_oiseau      = htmlspecialchars($_POST['nom_oiseau']);
    $genre_oiseau    = htmlspecialchars($_POST['genre_oiseau']);
    $prix_oiseau     = htmlspecialchars($_POST['prix_oiseau']);
    $cat_oiseau   = htmlspecialchars($_POST['cat_oiseau']);
    $bruit_oiseau   = htmlspecialchars($_POST['bruit_oiseau']);
    $desc_oiseau      = htmlspecialchars($_POST['desc_oiseau']);


    $file_path     = htmlspecialchars($_POST['file_path']); 
    $ajouter_oiseau  = htmlspecialchars($_POST['btn_modifier_oiseau']);

        
    try {

        $response = $file_path ;
        if(isset($_FILES['file_oiseau']['name'])){
        
                $filename = $_FILES['file_oiseau']['name'];
        
                /* Location */
                $location = "../upload/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
            
                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");
            
                
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                    if(move_uploaded_file($_FILES['file_oiseau']['tmp_name'], $location)){
                        $location = "upload/".$filename;
                        $response = $location;
                    }
                
                }
        }

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();
        $sql = "update oiseau 
            set nom='".$nom_oiseau."',
                genre='".$genre_oiseau."',
                cat='".$cat_oiseau."',
                prix ='".$prix_oiseau."',
                bruit='".$bruit_oiseau."',
                descs= '".$desc_oiseau."'
               
            where id='".$_POST['id']."'
            ";
        $updated = $crud->update($sql,$pdo) ;

        $sqlalbum = "update album set paths='".$response."' where oiseau='".$_POST['id']."'";
       $updated = $crud->update($sqlalbum ,$pdo) ;
        echo  "Modification reussie" ;
    } 
    catch(Exception $e){
        echo $e ;
    }
  
}



// supprimer = oiseau
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_supprimer_oiseau'])) {
    $id = htmlspecialchars($_POST['id']);
    try{
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();
        $sql = "delete from oiseau where id='".$id."' ";
        $students = $crud->delete($sql,$pdo) ;
      
        echo  $id ;
    }catch (Exception $e){
        echo $e;
        //header("Location:controller.php?tache=errordb_connexion");
    }
}

?>