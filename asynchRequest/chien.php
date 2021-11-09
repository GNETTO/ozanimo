<?php
require("model/Items.php");
require("model/Album.php");
require("model/Stock.php");
require("model/Stock_History.php");
require("model/Item_Info.php");


// CREATE CHIEN
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_ajouter_chien'])){
    
    $nom_chien      = htmlspecialchars($_POST['nom_chien']);
    $race_chien     = htmlspecialchars($_POST['race_chien']);
    $poids_chien    = htmlspecialchars($_POST['poids_chien']);
    $age_chien      = htmlspecialchars($_POST['age_chien']);
    $prix_chien     = htmlspecialchars($_POST['prix_chien']);
    $genre_chien    = htmlspecialchars($_POST['genre_chien']);
    $taille_chien   = htmlspecialchars($_POST['taille_chien']);
    $fourure_chien  = htmlspecialchars($_POST['fourure_chien']);
    $race_chien      = htmlspecialchars($_POST['cat_chien']);
    $desc_chien      = htmlspecialchars($_POST['desc_chien']);
    //$file_chien     = htmlspecialchars($_POST['file_chien']);
    $ajouter_chien  = htmlspecialchars($_POST['btn_ajouter_chien']);
 
    try {

        $item          = new Item(); 
        $item_info     = new Item_Info();
        $album         = new Album();
        $stock         = new Stock();
        $stock_history = new Stock_History();

        $response = "";

        if(isset($_FILES['file_chien']['name'])){

            $filename = $_FILES['file_chien']['name'];
        
            /* Location */
             $location = "../upload/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");
            
                
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                if(move_uploaded_file($_FILES['file_chien']['tmp_name'], $location)){
                    $location = "upload/".$filename;
                    $response = $location;
                }
                
            }
        }
    
        $sql = "INSERT INTO items VALUES ( null, '".$nom_chien."', 'ch001','dog','not sold','', '".$desc_chien."')";  
        $id_item = $item->addItem($sql);
         
        $sql = "INSERT INTO album VALUES (null, '". $id_item."', '".$response."',0)"; 
        $id_alb = $album->addAlbum($sql);
            
        $sql = "INSERT INTO stock VALUES (null, '". $id_item."',0)"; 
        $id_alb = $album->addStock($sql);

        $sql = "INSERT INTO items_info ('item','fourure','weight','age','genre', 'race') VALUES (null, '". $id_item."', '".$fourure_chien."','".$poids_chien."','".$age_chien."','".$genre_chien."','".$race_chien."')"; 
        $id_alb = $album->addAlbum($sql);

    }catch(Exception $e){
        echo $e;
        //echo -1;
    }   
   
}
  

//DISPLAY ALL CHIEN  ON TABLE
if( $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['readAnimal'])){
    try {
        $sql = "SELECT * FROM chien";
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
                            <th scope='col'>Race</th>
                            
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
                            <td>".$row['age']."</td>
                            <td>".$row['genre']."</td>
                            <td>".$row['taille']."</td>
                            <td>".$row['poids']."</td>
                            <td>".$row['prix']."</td>
                            <td>".$row['race']."r</td>
                            <td> <button class='btn btn-primary btn-sm btn-action-c' data-idanimal='".$row['id']."' data-action='0' > ... </button></td>
                            <td><button  class='btn btn-light btn-sm btn-action-c'  data-idanimal='".$row['id']."'  data-action='1'> + </button></td>
                            <td><button class='btn btn-success btn-sm btn-action-c' data-idanimal='".$row['id']."'  data-action='2'> * </button></td>
                            <td><button class='btn btn-danger btn-sm btn-action-c' data-idanimal='".$row['id']."'   data-action='3'> - </button></td>
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

        $sql1 = "SELECT chien.id as 'idchien', nom , taille, poids, prix, genre, race, fourure, descs, album.id as 'idalbum', dte, paths, oiseau, chien, accessoire,profils FROM  chien, album  where  chien.id = album.chien and  album.profils = 1 and chien.id = '".$id."'";
        $animal = $crud->read($sql1, $pdo);
        
        /*$sql2 = "SELECT * FROM  album where chien='".$id."' and profile=1 " ;
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


// UPDATE ON ANIMAL = chien
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_modifier_chien'])) {
    //$id_chien      = htmlspecialchars($_POST['id_chien']);
    $nom_chien      = htmlspecialchars($_POST['nom_chien']);
    $race_chien     = htmlspecialchars($_POST['race_chien']);
    $poids_chien    = htmlspecialchars($_POST['poids_chien']);
    $age_chien      = htmlspecialchars($_POST['age_chien']);
    $prix_chien     = htmlspecialchars($_POST['prix_chien']);
    $genre_chien    = htmlspecialchars($_POST['genre_chien']);
    $taille_chien   = htmlspecialchars($_POST['taille_chien']);
    $fourure_chien  = htmlspecialchars($_POST['fourure_chien']);
    //$cat_chien      = htmlspecialchars($_POST['cat_chien']);
    $desc_chien      = htmlspecialchars($_POST['desc_chien']);
    $file_path     = htmlspecialchars($_POST['file_path']); 
    $ajouter_chien  = htmlspecialchars($_POST['btn_modifier_chien']);

        
    try {

        $response = $file_path ;
        if(isset($_FILES['file_chien']['name'])){
        
                $filename = $_FILES['file_chien']['name'];
        
                /* Location */
                $location = "../upload/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
            
                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");
            
                
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                    if(move_uploaded_file($_FILES['file_chien']['tmp_name'], $location)){
                        $location = "upload/".$filename;
                        $response = $location;
                    }
                
                }
        }

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();
        $sql = "update chien 
            set nom='".$nom_chien."',
                age='".$age_chien."',
                genre='".$genre_chien."',
                taille='".$taille_chien."',
                poids='".$poids_chien."',
                prix ='".$prix_chien."',
                fourure='".$fourure_chien."',
                race='".$race_chien."',
                descs= '".$desc_chien."'
               
            where id='".$_POST['id']."'
            ";
        $updated = $crud->update($sql,$pdo) ;

        $sqlalbum = "update album set paths='".$response."' where chien='".$_POST['id']."'";
       $updated = $crud->update($sqlalbum ,$pdo) ;
        echo  "Modification reussie" ;
    } 
    catch(Exception $e){
        echo $e ;
    }
  
}



// supprimer = chien
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_supprimer_chien'])) {
    $id = htmlspecialchars($_POST['id']);
    try{
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $crud = new Crud();
        $sql = "delete from chien where id='".$id."' ";
        $students = $crud->delete($sql,$pdo) ;
      
        echo  $id ;
    }catch (Exception $e){
        echo $e;
        //header("Location:controller.php?tache=errordb_connexion");
    }
}
/*
$pdo = new PDO("mysql:dbname=db_igs; host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $crud = new Crud();
    $sql = "update students 
        set nom='".$_POST['nom']."',
            prenom='".$_POST['prenom']."',
            contact='".$_POST['contact']."',
            pseudo='".$_POST['pseudo']."',
            password='".$_POST['password']."',
            filiere='".$_POST['filiere']."',
            email='".$_POST['email']."'
        where id='".$_POST['id']."'
        ";
    $students = $crud->update($sql,$pdo) ;
    /*$array_student =array(); 
    while($row = $students->fetch()){ 
        array_push($array_student,$row);
    }
    $pdo =null ;*/
    //echo  "Modification reussie" ;

/*INSERT INTO `animals`
 (`id`, `name`, `race`, `poid`, `age`, `cout`, `taille`, `fourure`, `cat`, `typeanimal`, `description`) 
 VALUES
 (NULL, 'rex', NULL, NULL, NULL, NULL, NULL, NULL, 'cat1', 'chien', NULL);*/
?>