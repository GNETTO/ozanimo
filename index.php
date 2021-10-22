<?php

require("Router.php");
$router = new Router();


$router->get('acceuil', function($req, $res){
    
   $res->render("acceuil.php",array("email"=>"tierogneto@gmail.com"),"","");
   
});

$router->get('contactez-nous', function($req, $res){
    
    $res->render("contactez.php",array("email"=>"tierogneto@gmail.com"),"","");
});

$router->get('login', function($req, $res){
    
    $res->render_self("login.php",array("email"=>"tierogneto@gmail.com"),"self_header","");
});

$router->post('login', function($req, $res){

    require("model/users.php");
        $email =     $req->body()['email'];
        $password =  $req->body()['password'];

        // check if email  exist 
       /* function isEmailExist($email, $connect){
            $data = $connect->query("select * from students where email='".$email."'");
            $data->setFetchMode(PDO::FETCH_ASSOC);

            if($data->rowCount() == 1){ 
              return true ;
            }
  
            return false ;
          }
  
          if (  isEmailExist($email,$pdo)){
            die("Ce mail exist deja");
          }*/
          
        try {
            $user = new Users();
            $sql = "SELECT * FROM collaborateur where email='".$email."' AND pass ='".$password."'";
    
            $u = $user->readUser($sql);
            $current_user = '' ;
            $counter = 0 ;
            while( $row=$u->fetch() ){
                $counter++;
                $current_user= $row;
            }
           
            if( $counter == 1){
                session_start();
                $_SESSION['user']= $current_user ;
                Header("Location:dashboard");
            }else{ 
                $res->render_self('login.php');
            }
        }
        catch(Exception $e){
            header("Location:erreur?name=creation de livre&message=".$e->getMessage());
        }
});

$router->get('dashboard', function($req, $res){
    
    $res->render_dashboard("dashboard.php");
});

$router->get('dashboard_liste_chien', function($req, $res){

    require("model/Chiens.php");
    try {

        $book = new Chien();
        $sql = "SELECT * FROM  chien";

        $chiens = $book->readChien($sql);
        $res->render_dashboard("tous_les_chiens.php",$chiens);
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }

    //$res->render_dashboard("dashboard.php");
});

$router->get('dashboard_liste_oiseaux', function($req, $res){
    require("model/Oiseaux.php");
    try {

        $book = new Oiseau();
        $sql = "SELECT * FROM  oiseau";

        $chiens = $book->readOiseau($sql);
        $res->render_dashboard("tous_les_oiseaux.php",$chiens);
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }

});
$router->get('dashboard-liste_accessoires', function($req, $res){
    
    $res->render("dashboard.php",array("partial"=>"partial1.php"),"d",'tous-chien');
});

$router->get('dashboard_ajouter_animal', function($req, $res){

    $res->render("dashboard_ajouter_animal.php",array("user"=>""),"d","");
});


$router->get('', function($req){
    echo "get vente";
},"");

$router->post('vente', function($req){
    echo "post vente";
});



$router->nothing(function($req){
    echo "Une erreur est apparue";
});

//echo $_SERVER['REQUEST_URI'];

/*$body  =array();
if($_SERVER['REQUEST_METHOD'] == "POST"){

    foreach($_POST as $key=>$val ){
        echo $key . " => ".$val ."<br>";
        $body[$key]= $val;
    }
}*/

//$bodytag = str_replace("body", "black", "body"); echo $bodytag . " hello" ;

/*$str = "maman travail" ; 
if( strpos($str, "travails") ){
    echo "Match";
}else {
    echo "no match";
}
 */
?>

