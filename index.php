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
    
    $res->render("login.php",array("email"=>"tierogneto@gmail.com"),"self_header","");
});

$router->post('login', function($req, $res){
    
    $res->render("login.php",array("email"=>"tierogneto@gmail.com"),"self_header","");
});

$router->get('dashboard', function($req, $res){
    
    $res->render("dashboard.php",array("partial"=>"partial1.php"),"d","welcome");
});

$router->get('dashboard-liste_chien', function($req, $res){
    
    $res->render("dashboard.php",array("partial"=>"partial1.php"),"d",'tous-chien');
});

$router->get('dashboard-liste_oiseaux', function($req, $res){
    
    $res->render("dashboard.php",array("partial"=>"partial1.php"),"d",'tous-oiseau');
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

