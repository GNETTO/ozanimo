<div class="modal fade" id="aminalfiche" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: black !important;">
     <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style="background-color:;">
        
        <div class="modal-body position-relative">
        <img src="assets/dogs.jpg" class="position-absolute top-50 thumbnail rounded">
        <div style="width:40%;margin:auto;border:2p solid red">
       
        <form class="needs-validatio" novalidat   id="form-ajout-chien" >
          <div class="bg-primary p-2 text-center text-light display-5 mb-3"> Ajouter un Chien</div>

        <div class="row  mb-3">
          <label for="validationDefault01" class="col-sm-2 col-lg-4">Nom de l' animal </label>
          <div class="col-sm-10 col-lg-7">
            <input type="text" class="form-control" id="nom_chien"  name="nom_chien" placeholder="Le nom de l' animal"  required>
            <input type="text" class="form-control d-none" id="id_chien"  name="id_chien" placeholder="" value="<?php ?>">
            <div class="invalid-feedback">
                Le Nom est obligatoire 
            </div>
          </div>
        </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-lg-4">Sexe </label>
        <div class="col-sm-10 col-lg-7">
          <select class="form-control custom-select" name="genre_chien" id="genre_chien">
            <option value="0"> Choisir...</option>
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
            
          </select>
        </div>
      </div>

        <div class="row  mb-3">
          <label for="validationDefault01" class="col-sm-2 col-lg-4">Taille</label>
          <div class="col-sm-8 col-lg-5">
            <input type="number" class="form-control" id="taille_chien" name ="taille_chien" placeholder="La taille de l' animal"  required>
            <div class="invalid-feedback">
              Le
            </div>
            
          </div>
          <div  class="col-sm-2 col-lg-2" >Metre(s)</div>
        </div>

        <div class="row  mb-3">
          <label for="validationDefault01" class="col-sm-2 col-lg-4">Age</label>
          <div class="col-sm-10 col-lg-7">
            <input type="number" class="form-control" id="age_chien" name ="age_chien" placeholder="L' age  de l' animal"  require>
            <div class="invalid-feedback">
              Le
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="validationDefault02" class="col-sm-2 col-lg-4"> Poids </label>
          <div class="col-sm-8 col-lg-5">
            <input type="number" class="form-control" id="poids_chien" name="poids_chien" placeholder="Le poids de l' animal" require>             
          </div>
          <div  class="col-sm-2 col-lg-2" >Kg</div></div>

        <div class="row  mb-3">
        <label for="validationDefault01" class="col-sm-2 col-lg-4">Le Prix  </label>
        <div class="col-sm-10 col-lg-7">
          <input type="number" class="form-control" id="prix_chien"  name="prix_chien" placeholder="Le cout de l' animal"  require>
          <div class="invalid-feedback">
            Le format de  votre n' est pas valide 
          </div>
        </div>
      </div>
      
       <div class="row  mb-3">
         <label for="validationDefault01" class="col-sm-2 col-lg-4">La fourure </label>
        <div class="col-sm-10 col-lg-7">
          <input type="text" class="form-control" id="fourure_chien" name="fourure_chien" placeholder="La fourure de l' animal"  required>
          <div class="invalid-feedback">
            Le pseudo  est obligatoire
          </div>
        </div>
       </div>
     
      <div class="row mb-3">
        <label class="col-sm-2 col-lg-4">Choisir une race </label>
        <div class="col-sm-10 col-lg-7">
          <select class="form-control custom-select" name="race_chien" id="race_chien">
            <option value="0"> Choisir...</option>
            <option value="race1">Race1</option>
            <option value="race2">Race 2</option>
            <option value="race3">Race 3</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-lg-4">Choisir uune Categorie </label>
        <div class="col-sm-10 col-lg-7">
          <select class="form-control custom-select" name="cat_chien" id="cat_chien">
            <option value="0"> Choisir...</option>
            <option value="cat1">cat1</option>
            <option value="cat2">cat 2</option>
    
          </select>
        </div>
      </div>

      <div class="row mb-3">
          <label for="validationDefault02" class="col-sm-2 col-lg-4"> Description </label>
          <div class="col-sm-10 col-lg-7">
            <textarea class="form-control" id="desc_chien" name="desc_chien" placeholder="Ecrire une description "> </textarea>            
          </div>
          </div>


      <div class="row mb-3">
        <label class="custom-file col-sm-2 col-lg-4">Charger un photo </label>
        <div class="col-sm-10 col-lg-7 custom-file">
          <input type="file" class="custom-file-input" id="file_chien" name="file_chien" >
        </div>
      </div>
        
      <div class="row mb-3" >
        <div class="d-flex justify-content-center col-12">
          <img class="loadedImage thumbnail" id="img_modification" src="http://localhost/IGS/chalengePhpInscription/publics/solid_svg/user-circle.svg" style="width:80px">
        </div>
        <div class="image-info col-12 text-danger" id="image-info"></div>
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-dark" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_chien"    id="btn_retour_chien">Retour</button>
        <button class="btn btn-success" type="button" name="btn_ajouter_chien"   id="btn_ajouter_chien">Ajouter</button>
        <button class="btn btn-warning" type="button" name="btn_modifier_chien"  id="btn_modifier_chien">Modifier</button>
        <button class="btn btn-danger"  type="button" name="btn_supprimer_chien" id="btn_supprimer_chien">Supprimer</button>
      </div>
      </div>
      </form>
</div>
        </div> 
      </div>
     </div>
    </div>         