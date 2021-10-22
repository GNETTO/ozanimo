<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <script src="modules/helpers.js"></script>
    <script src="modules/method.js"></script>
    

      <!-- Bootstrap core CSS -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    
  </head>
  <body>
    

  <!-- MODAL FOR ADDING , MODIFYING , UPDATE chien Info -->
        <?php  
        
          require("partials/modal-fiche-chien.php");
          require("partials/modal-fiche-oiseau.php");

        ?>
   

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="acceuil">Page Acceuil</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3 text-danger" href="#">Se deconnecter</a>
        </div>
      </div>

    </header>

<div class="container-fluid">
  
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="overflow:auto ">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <a class="nav-link active" aria-current="page" href="dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
        </ul>
        <div class="card">
          <div class="card-header">Mes Chiens <span class="homebadge"> 50</span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><button class="hbtn w-100" style="text-align:left" data-bs-toggle="modal" data-bs-target="#aminalfiche">Nouveau </button></li>
            <li class="list-group-item"><a  href="dashboard_liste_chien" class="hbtn w-100" style="text-align:left" >Lire </a></li>
          
          </ul>
        </div>
        

        <div class="card">
          <div class="card-header card-bkg">Mes Oiseaux <span class="homebadge"> 20</span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><button class="hbtn w-100" style="text-align:left" data-bs-toggle="modal" data-bs-target="#oiseau-modal">Nouveau </button></li>
            <li class="list-group-item"><a  href="dashboard_liste_oiseaux" class="hbtn w-100" style="text-align:left" >Lire </a></li>
           
          </ul>
        </div>
       

        <div class="card">
          <div class="card-header">Mes Accessoires <span class="homebadge"> 20</span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><button class="hbtn w-100" style="text-align:left" data-bs-toggle="modal" data-bs-target="#aminalfiche">Nouveau </button></li>
            <li class="list-group-item"><a  href="dashboard-liste_accessoires" class="hbtn w-100" style="text-align:left" >Lire </a></li>
            
          </ul>
        </div>
        
        <div class="card">
          <div class="card-header">Mes Ventes <span class="homebadge"> <a href="" class="text-white" >Ajourd hui 220</a></span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><a  href="dashboard-liste_accessoires" class="hbtn w-100" style="text-align:left" >Voir tout </a></li>
          </ul>
        </div>

        <div class="card">
          <div class="card-header">Mes Client <span class="homebadge"> 240</span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><button class="hbtn w-100" style="text-align:left" data-bs-toggle="modal" data-bs-target="#aminalfiche">Nouveau </button></li>
            <li class="list-group-item"><a  href="dashboard-liste_accessoires" class="hbtn w-100" style="text-align:left" >Lire </a></li>
            
          </ul>
        </div>

        <div class="card">
          <div class="card-header">Mes Client <span class="homebadge"> 240</span> </div>
          <ul class=" list-group list-group-flush">
            <li class="list-group-item"><button class="hbtn w-100" style="text-align:left" data-bs-toggle="modal" data-bs-target="#aminalfiche">Nouveau </button></li>
            <li class="list-group-item"><a  href="dashboard-liste_accessoires" class="hbtn w-100" style="text-align:left" >Lire </a></li>
            
          </ul>
        </div>


      </div>
    </nav>
  </div>
  </div>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?=$content ?>
  </main>

  <script src="assets/cdn/popper.min.js"></script>
  <script src="assets/cdn/bootstrap.min.js"></script>

<script src="assets/cdn/query-3.2.1.slim.min.js"></script>
    
    

  