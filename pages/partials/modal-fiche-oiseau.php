<div class="modal fade" id="oiseau-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: black !important;">
     <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style="background-color:;">
        
        <div class="modal-body position-relative">
        <img src="assets/dogs.jpg" class="position-absolute top-50 thumbnail rounded">
        <div style="width:40%;margin:auto;border:2p solid red">
       
        <form class="needs-validatio" novalidat   id="form-ajout-oiseau" >
          <div class="bg-primary p-2 text-center text-light display-5 mb-3"> Ajouter un oiseau</div>

        <div class="row  mb-3">
          <label for="validationDefault01" class="col-sm-2 col-lg-4">Nom de l' animal </label>
          <div class="col-sm-10 col-lg-7">
            <input type="text" class="form-control" id="nom_oiseau"  name="nom_oiseau" placeholder="Le nom de l' animal"  required>
            <input type="text" class="form-control" id="id_oiseau"  name="id_oiseau" placeholder="" value="<?php ?>">
            <div class="invalid-feedback">
                Le Nom est obligatoire 
            </div>
          </div>
        </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-lg-4">Sexe </label>
        <div class="col-sm-10 col-lg-7">
          <select class="form-control custom-select" name="genre_oiseau" id="genre_oiseau">
            <option value="0"> Choisir...</option>
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
            
          </select>
        </div>
      </div>


        <div class="row  mb-3">
          <label for="validationDefault01" class="col-sm-2 col-lg-4">Bruit</label>
          <div class="col-sm-10 col-lg-7">
            <input type="text" class="form-control" id="bruit_oiseau" name ="bruit_oiseau" placeholder="L' age  de l' animal"  require>
            <div class="invalid-feedback">
              Le
            </div>
          </div>
        </div>


        <div class="row  mb-3">
        <label for="validationDefault01" class="col-sm-2 col-lg-4">Le Prix  </label>
        <div class="col-sm-10 col-lg-7">
          <input type="number" class="form-control" id="prix_oiseau"  name="prix_oiseau" placeholder="Le cout de l' animal"  require>
          <div class="invalid-feedback">
            Le format de  votre n' est pas valide 
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-lg-4">Choisir uune Categorie </label>
        <div class="col-sm-10 col-lg-7">
          <select class="form-control custom-select" name="cat_oiseau" id="cat_oiseau">
            <option value="0"> Choisir...</option>
            <option value="cat1">cat1</option>
            <option value="cat2">cat 2</option>
    
          </select>
        </div>
      </div>

      <div class="row mb-3">
          <label for="validationDefault02" class="col-sm-2 col-lg-4"> Description </label>
          <div class="col-sm-10 col-lg-7">
            <textarea class="form-control" id="desc_oiseau" name="desc_oiseau" placeholder="Ecrire une description "> </textarea>            
          </div>
          </div>

      <div class="row mb-3">
        <label class="custom-file col-sm-2 col-lg-4">Charger un photo </label>
        <div class="col-sm-10 col-lg-7 custom-file">
          <input type="file" class="custom-file-input" id="file_oiseau" name="file_oiseau" >
        </div>
      </div>
        
      <div class="row mb-3" >
        <div class="d-flex justify-content-center col-12">
          <img class="loadedImage thumbnail" id="img_modification_o" src="http://localhost/IGS/chalengePhpInscription/publics/solid_svg/user-circle.svg" style="width:80px">
        </div>
        <div class="image-info col-12 text-danger" id="image-info_o"></div>
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-dark" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_oiseau"    id="btn_retour_oiseau">Retour</button>
        <button class="btn btn-success" type="button" name="btn_ajouter_oiseau"   id="btn_ajouter_oiseau">Ajouter</button>
        <button class="btn btn-warning" type="button" name="btn_modifier_oiseau"  id="btn_modifier_oiseau">Modifier</button>
        <button class="btn btn-danger"  type="button" name="btn_supprimer_oiseau" id="btn_supprimer_oiseau">Supprimer</button>
      </div>
      </div>
      </form>
</div>
        </div> 
      </div>
     </div>
    </div>         