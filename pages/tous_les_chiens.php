<?php ob_start(); ?>

<table class="table table-sm">
<thead>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Age</th>
        <th>Taille</th>
        <th>Race</th>
        <th>Prix</th>
        <th>Genre</th>
        <th>Action</th>
        
    </tr>
</thead>
<?php 
// href='dashboard_updatechien?id=".$chien['id']."'
    while($chien = $data->fetch()){
        echo "<tr class='ligne-livre' data-bgmouseover='lightblue' data-bgmouseout='white' data-chien=".$chien['id']." data-selected='0'>
                <td>".$chien['id']."</td>
                <td>".$chien['nom']."</td>
                <td>".$chien['age']."</td>
                <td>".$chien['taille']."</td>
                <td>".$chien['race']."</td>
                <td>".$chien['prix']."</td>
                <td>".$chien['genre']."</td>
                <td>
                    <button class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' data-idanimal='".$chien['id']."' data-action='0' > ... </button>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_updatechien?id=".$chien['id']."' data-idanimal='".$chien['id']."'  data-action='1'> <img src''> </a>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_deletechien?id=".$chien['id']."' data-idanimal='".$chien['id']."'   data-action='2'> - </a>
                </td>
        
        </tr>";
    }
?>
</table>

<script>
   let formadatas = document.getElementsByClassName("needs-validation");
  
window.addEventListener('load', event=>{

          let btn_ajouter_chien  = document.getElementById("btn_ajouter_chien");
          let btn_modifier_chien = document.getElementById("btn_modifier_chien");
          let btn_supprimer_chien = document.getElementById("btn_supprimer_chien");

          let btn_ajouter_oiseau  = document.getElementById("btn_ajouter_oiseau");
          let btn_modifier_oiseau = document.getElementById("btn_modifier_oiseau");
          let btn_supprimer_oiseau = document.getElementById("btn_supprimer_oiseau");

          // ajouter chien
          btn_ajouter_chien.addEventListener('click', event=>{
            ajout_chien();
          })

          //modifier chien
          btn_modifier_chien.addEventListener('click', event=>{
            modifier_chien();
          });

          // btn supprimer oiseau : from 
          btn_supprimer_chien.addEventListener('click', event=>{
            supprimer_chien();
          });

        /**
        CRUD OISEAU
        */


        // ajouter oiseau
        btn_ajouter_oiseau.addEventListener('click', event=>{
            //ajout_oiseau();
            
            crudMethodOiseau.create();
          })

          //modifier oiseau
          btn_modifier_oiseau.addEventListener('click', event=>{
            crudMethodOiseau.update();
          });

          // btn supprimer oiseau : from 
          btn_supprimer_oiseau.addEventListener('click', event=>{
            crudMethodOiseau.delete();
          });

          //reads data of all animals
          //AjaxRequest("GET", "", query, callback)

          function readAnimalData(){
            let query ="readAnimal=yes";
            AjaxRequest("GET","asynchRequest/crudAnimal.php",query, ajaxr =>{
                if(ajaxr.responseText != -1 ){
                    //alert("Enregistrement reussie")
                    /*let tab_tousanimaux =document.getElementById("tab_tousanimaux");
                    tab_tousanimaux .innerHTML="";
                    tab_tousanimaux.innerHTML= ajaxr.responseText ;
                    console.log(ajaxr.responseText);
                    ///Adding event 
                    addClickBtnActionChien();*/
                }else{

                        alert("Echec d enregistrement");
                        console.log(ajaxr.responseText)
                }
            })
          }
          //display all animal in table 
          //readAnimalData();
          

          // add event  when clicking on animal  btn modification
          function addClickBtnActionChien(){

            let btnaction  = document.querySelectorAll(".btn-action-c");  console.log(btnaction)
            Array.prototype.map.call(btnaction, btn=>{
              btn.addEventListener("click",event=>{
                let ajaxr ;
              
                try {
                    ajaxr = new XMLHttpRequest();
                }catch(e){
                  try {
                    ajaxr = new ActiveXObject("Msxml2.XMLHTTP")
                  }catch(e){
                    try {
                      ajaxr = new ActiveXObject("Microsoft.XMLHTTP")
                    }catch(e){
                      alert("La connexion Ajax a échoué .")
                  }
                  }
                }

                  let current_btn = event.currentTarget ; console.log(current_btn)
                  ajaxr.onreadystatechange = function(){
                      if(ajaxr.readyState == 4){
                          //alert(ajaxr.responseText);
                        let oneAnimal = JSON.parse(ajaxr.responseText); console.log(oneAnimal);
                      

                          document.getElementById("id_chien").value=oneAnimal[0].idchien; 
                          document.getElementById("nom_chien").value=oneAnimal[0].nom;
                          document.getElementById("genre_chien").value=oneAnimal[0].genre;
                          //document.getElementById("genre_oiseau").value=oneAnimal[0].contact;
                          document.getElementById("taille_chien").value=oneAnimal[0].taille;
                          document.getElementById("age_chien").value=oneAnimal[0].age;
                          document.getElementById("poids_chien").value=oneAnimal[0].poids;
                          document.getElementById("prix_chien").value=oneAnimal[0].prix;
                          document.getElementById("fourure_chien").value=oneAnimal[0].fourure;
                          document.getElementById("race_chien").value=oneAnimal[0].race;
                    
                          document.getElementById("img_modification_c").src=oneAnimal[0].paths;
                          document.getElementById("desc_chien").value=oneAnimal[0].descs;                

                          console.log( current_btn.getAttribute("data-action") );
                          let btn_create = document.getElementById("btn_ajouter_chien");
                          let btn_modif = document.getElementById("btn_modifier_chien") ;
                          let btn_supp  = document.getElementById("btn_supprimer_chien") ;

                          btn_supp.style.display="block";  
                          btn_modif.style.display="block";
                          btn_create.style.display="block";
               
                          switch( current_btn.getAttribute("data-action")){
                                // vision
                                case "0" : btn_supp.style.display="none";
                                  btn_modif.style.display="none"; 
                                  
                                  btn_create.style.display="none";

                                  break;

                                  // create
                                case "1":
                                    btn_modif.style.display="none";
                                    btn_supp.style.display="none"; 
                                    break;
                                  // update
                                case "2": btn_supp.style.display="none";
                                      btn_create.style.display="none";                   

                                    break;
                                  // delete 
                                case "3": btn_modif.style.display="none";
                                      btn_create.style.display="none";
                                  
                                break;

                              }

                              $('#aminalfiche').modal({keyboard: true});
                              $('#aminalfiche').modal('show')
                          }
                        }
                                
                  ajaxr.open("GET","asynchRequest/crudAnimal.php?crud_id="+event.currentTarget.getAttribute("data-idanimal"));
                  ajaxr.send(null); 
                })
              })

          }
          //OISEAU CRUD FUNCTIONS
                 
        crudMethodOiseau.readFromTab(); 
       

})
///----end window onload


function ajout_chien(){

          let nom_chien         = document.getElementById("nom_chien").value;
          let genre_chien       = document.getElementById("genre_chien").value;
          let taille_chien      = document.getElementById("taille_chien").value;
          let age_chien         = document.getElementById("age_chien").value;
          let poids_chien       = document.getElementById("poids_chien").value;
          let prix_chien        = document.getElementById("prix_chien").value;
          let fourure_chien     = document.getElementById("fourure_chien").value;
          let race_chien        = document.getElementById("race_chien").value;
          let desc_chien        = document.getElementById("desc_chien").value;
          let cat_chien         = document.getElementById("cat_chien").value;
          let file_chien        = document.getElementById("file_chien").files[0];
          let btn_ajouter_chien = document.getElementById("btn_ajouter_chien").innerHTML;
        
          let formadata = new FormData();

          formadata.append('nom_chien',nom_chien);
          formadata.append('genre_chien',genre_chien);
          formadata.append('taille_chien',taille_chien);
          formadata.append('age_chien',age_chien);
          formadata.append('poids_chien',poids_chien);
          formadata.append('prix_chien',prix_chien);
          formadata.append('fourure_chien',fourure_chien);
          formadata.append('race_chien',race_chien);
          formadata.append('cat_chien',cat_chien);
          formadata.append('file_chien',file_chien);
          formadata.append('desc_chien',desc_chien);
          formadata.append('btn_ajouter_chien',btn_modifier_chien);
          //let query = `nom_oiseau=${nom_oiseau}&genre_oiseau=${genre_oiseau}&taille_oiseau=${taille_oiseau}&age_oiseau=${age_oiseau}&poids_oiseau=${poids_oiseau}&prix_oiseau=${prix_oiseau}&fourure_oiseau=${fourure_oiseau}&race_oiseau=${race_oiseau}&cat_oiseau=${cat_oiseau}&file_oiseau=${file_oiseau}&btn_ajouter_oiseau=${btn_ajouter_oiseau}`
        
          
            AjaxRequest("POST","asynchRequest/crudAnimal.php",formadata, ajaxr =>{
              if(ajaxr.responseText != -1 ){
                alert("Enregistrement reussie")
                console.log(ajaxr.responseText)
              }else{
                alert("Echec d enregistrement");
                console.log(ajaxr.responseText);
              }
            })
}


function modifier_chien(){

  let formadata = new FormData();
 
  let id                = document.getElementById("id_chien").value;
  let nom_chien         = document.getElementById("nom_chien").value;
  let genre_chien       = document.getElementById("genre_chien").value;
  let taille_chien      = document.getElementById("taille_chien").value;
  let age_chien         = document.getElementById("age_chien").value;
  let poids_chien       = document.getElementById("poids_chien").value;
  let prix_chien        = document.getElementById("prix_chien").value;
  let fourure_chien     = document.getElementById("fourure_chien").value;
  let race_chien        = document.getElementById("race_chien").value;
  let cat_chien         = document.getElementById("cat_chien").value;
  let desc_chien        = document.getElementById("desc_chien").value;
  let file_chien        = document.getElementById("file_chien").files[0]  ; console.log(file_oiseau);
  //let filepath =   file_oiseau.name? "exist":"not exist"; console.log(filepath);

  var file_path ="";
  if(file_oiseau == undefined){
    //filepath ="";
    file_path = document.getElementById("img_modification_c").src;
  }
  let btn_modifier_chien = document.getElementById("btn_modifier_oiseau").innerHTML; 

  formadata.append('id',id);
  formadata.append('nom_chien',nom_chien);
  formadata.append('genre_chien',genre_chien);
  formadata.append('taille_chien',taille_chien);
  formadata.append('age_chien',age_chien);
  formadata.append('poids_chien',poids_chien);
  formadata.append('prix_chien',prix_chien);
  formadata.append('fourure_chien',fourure_chien);
  formadata.append('race_chien',race_chien);
  formadata.append('cat_chien',cat_chien);
          formadata.append('file_chien',file_chien); 
          formadata.append('desc_chien',desc_chien);
          formadata.append('btn_modifier_chien',btn_modifier_chien);
  formadata.append('file_path',file_path); 


            AjaxRequest("POST","asynchRequest/crudAnimal.php",formadata, ajaxr =>{
              if(ajaxr.responseText != -1 ){
                alert("Mise a jour reussie")
                console.log(ajaxr.responseText)
              }else{
                alert("Echec d enregistrement")
                console.log(ajaxr.responseText)
              }
            })
}

function supprimer_chien(){
      let formadata = new FormData();
      let id       = document.getElementById("id_chien").value; 
      
      let btn_supprimer_chien = document.getElementById("btn_supprimer_chien").innerHTML;

      formadata.append('id',id);
      formadata.append('btn_supprimer_chien',btn_supprimer_chien);

      let query = `id=${id}&btn_supprimer_chien=${btn_supprimer_chien}`;
        
            AjaxRequest("POST","asynchRequest/crudAnimal.php",formadata, ajaxr =>{
              if(ajaxr.responseText != -1 ){
                alert("Suppression reussie")
                console.log(ajaxr.responseText)
              }else{
                alert("Echec d enregistrement")
              }
            })
}

function AjaxRequest(method, action, query, callback){

  helper.checkAjaxOject().
      then(ajaxr=>{
      
        ajaxr.onreadystatechange = function(){

          if( ajaxr.readyState == 4){
            callback(ajaxr)    
          }    
        }
        
        
        if(method == "GET"){
          ajaxr.open("GET",`${action}?${query}`);
          ajaxr.send(null);
        }else if(method == "POST"){
          
          ajaxr.open("POST",`${action}`,true);
          ajaxr.send(query); 
        }
       
    }).
    catch(failure=>{
      console.log(failure)
    })
}

//File upload 

let file =  document.getElementById("file_chien"); 
let img_modification =  document.getElementById("img_modification");
let image_info = document.getElementById("image-info")
console.log(file)
  //console.log( file)
file.addEventListener("change",e=>{
    let f = event.target.files[0]; console.log( typeof f)
    let fType = f.type ;
   
    let validextension = ["image/jpeg","image/png","image/jpg"];
    if(fType == validextension[0] || fType == validextension[1] || fType == validextension[2]){
      let fileReader = new FileReader();
      fileReader.onload = function(e){
        img_modification.src = e.target.result;
      }
      fileReader.readAsDataURL(f);
      image_info.innerHTML ="";
    }else{
      img_modification.src="";
      file.value="";
      image_info.innerHTML = "Ce fichier n' est pas un image  ";
      img_modification.src ="assets/solid_svg/exclamation-circle.svg"
    }
  })
     
</script>
<?php $content=ob_get_clean(); ?>