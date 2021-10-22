<?php
class Router {
    var $get ;
    var $post;
    var $method ;
    var $query ;
    var $root ;
    var $current_dir;
    var $uri ;
    var $body  = array();
    var $request ;
    var $response ;
    var $nopath = true ;

    function __construct(){
        $this->request = new Request($this);
        $this->response = new Response($this);
        $this->init();
        //echo "query =".$this->query ."<br> uri =>".$this->uri . "<br> current_dir =>".$this->current_dir . " <br> root=>".$this->root. "<br>";
    }

    function init(){

        $this->method = $_SERVER['REQUEST_METHOD'];  
        $this->root = dirname(__DIR__); 
        $this->current_dir = __DIR__ ;
        $this->uri=    strtolower($_SERVER['REQUEST_URI']);
        $this->query = strtolower($_SERVER['QUERY_STRING']);
        $this->manageBody();

    }

    function manageBody(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           
            foreach($_POST as $key=>$val ){
                $this->body[$key]= $val;
            }
        }
    }

    function get($reqString, $handler){
        //echo "QUERY STRING ". $reqString ;
        if($reqString == null) return ; // prevent empty needle error
        if($this->method == "GET") {

           // echo "GET";
            if( strpos($this->uri, $reqString) && $this->compareDirectory($reqString)){
            
               
                $handler($this->request, $this->response);
                $this->nopath =false ;
             }
        } 
    }

    private function compareDirectory($reqString){
        $path = str_replace("\\","/",$this->current_dir.DIRECTORY_SEPARATOR.$reqString) ; //echo $path ."<br>";
        
        if(strpos(strtolower($path), $this->uri) ==true ){
            return true ;
        }
        return false;
    }

    function post($reqString, $handler){
        if($reqString == null) return ; // prevent empty needle error
        if($this->method == "POST"){
           
            if(strpos($this->uri,$reqString) && $this->compareDirectory($reqString)){
                
                $handler($this->request,$this->response);
                $this->nopath =false ;
            }
        }
    }

    function nothing($handler){
        if($this->nopath == true){
            $handler($this->request, $this->response);
        }
     }


}

class Request {
    var $router ;
    function __construct($router){
        $this->router = $router;
    }

    function body(){
        return $this->router->body;
    }

    function param(){
        
    }

}


class Response {
    var $router ;
    function __construct($router){
        $this->router = $router;
    }

    function render($page, $data, $dashbordHeader, $action){
     
       if($dashbordHeader == "d"){

        require("Pages/dashboardheader.php");
        require("Pages/".$page);
        
       }
       else if($dashbordHeader == "self_header")
       {
        require("Pages/login.php");
       }
       else
       {
        require("Pages/header.php");
        require("Pages/".$page);
        require("Pages/footer.php");

       } 

    }

}
?>