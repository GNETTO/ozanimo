<main>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
</section>

  <?php 
     require("class/crud.php");
     $crud = new Crud();
     $pdo ="";
     
     try{
         $pdo = new PDO("mysql:dbname=animalerie; host=localhost","root","");
     }catch (Exception $e){
         
         echo "connexion a la base donnée a echoué";
     }
     
     $sql = "SELECT * from chien where paye =false ";
     $chien = $crud->read($sql, $pdo);

     $sql2 = "SELECT * FROM  album where profils = 1";
     $album = $crud->read($sql2, $pdo);

     $photo_chien = array();
     $photo_oiseau = array();
     $photo_accessoire = array();

    while($r_album = $album->fetch()){

      if($r_album['accessoire'] != null){
          $photo_accessoire[$r_album['accessoire'] ] =$r_album['paths'];
      }
      
      if($r_album['chien'] != null){
        $photo_chien[$r_album['chien'] ] =$r_album['paths'];
      }

      if($r_album['oiseau'] != null){
        $photo_oiseau[$r_album['oiseau'] ] =$r_album['paths'];
      }
   
   
    }
     echo '
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          ';
     while($row_chien = $chien->fetch()){
       echo '
       <div class="col">
        <div class="card shadow-sm">
          <p class="p-2 d-flex justify-content-between"> '.$row_chien['nom'].' <span>'.$row_chien['age'].' ans</span></p>
          <img 
            class="bd-placeholder-img card-img-top" width="100%" height="225" 
            xmlns="http://www.w3.org/2000/svg" 
            role="img" aria-label="Placeholder: Thumbnail" 
            src="'.$photo_chien[$row_chien['id']].'"
            focusable="false">
          <div class="card-body">
            <p class="card-text">'.$row_chien['descs'].'</p>
             <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button 
                  type="button"
                   class="btn btn-sm btn-outline-secondary btn-cash-select" 
                   data-prix="'.$row_chien['prix'].'" data-produit='.$row_chien['nom'].' data-produitid='.$row_chien['id'].' data-isselected=0 data-age='.$row_chien['age'].'
                   onclick="lunchCash(this);"
                   >Achetez</button>

                  <button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
                </div>
                <small class="text-muted">'.$row_chien['prix'].' FCFA</small>
              </div>
          </div>
       </div>
       </div>
       ';
     }
     echo '
     </div>
     </div>
   </div>
     ';

?>

</main>


<!-- 

 <svg 
            class="bd-placeholder-img card-img-top" width="100%" height="225" 
            xmlns="http://www.w3.org/2000/svg" 
            role="img" aria-label="Placeholder: Thumbnail" 
            preserveAspectRatio="xMidYMid slice"
            focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"/>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
          </svg>
-->