function ajout_oiseau(){
    let nom_oiseau         = document.getElementById("nom_oiseau").value;
    let genre_oiseau       = document.getElementById("genre_oiseau").value;
    let bruit_oiseau       = document.getElementById("bruit_oiseau").value;
    let prix_oiseau        = document.getElementById("prix_oiseau").value;
    let desc_oiseau        = document.getElementById("desc_oiseau").value;
    let cat_oiseau        = document.getElementById("desc_oiseau").value;
    let file_oiseau        = document.getElementById("file_oiseau").files[0];
    let btn_ajouter_oiseau = document.getElementById("btn_ajouter_oiseau").innerHTML;
  
    let formadata = new FormData();

    formadata.append('nom_oiseau',nom_oiseau);
    formadata.append('genre_oiseau',genre_oiseau);
    formadata.append('bruit_oiseau',bruit_oiseau);
    formadata.append('prix_oiseau',prix_oiseau);
    formadata.append('cat_oiseau',cat_oiseau);
    formadata.append('file_oiseau',file_oiseau);
    formadata.append('desc_oiseau',desc_oiseau);
    formadata.append('btn_ajouter_oiseau',btn_modifier_oiseau);
    //let query = `nom_oiseau=${nom_oiseau}&genre_oiseau=${genre_oiseau}&taille_oiseau=${taille_oiseau}&age_oiseau=${age_oiseau}&poids_oiseau=${poids_oiseau}&prix_oiseau=${prix_oiseau}&fourure_oiseau=${fourure_oiseau}&race_oiseau=${race_oiseau}&cat_oiseau=${cat_oiseau}&file_oiseau=${file_oiseau}&btn_ajouter_oiseau=${btn_ajouter_oiseau}`
  
    
      AjaxRequest("POST","asynchRequest/crudOiseau.php",formadata, ajaxr =>{
        if(ajaxr.responseText != -1 ){
          alert("Enregistrement reussie d' oiseau")
          console.log(ajaxr.responseText)
        }else{
          alert("Echec d enregistrement d' oiseau");
          console.log(ajaxr.responseText);
        }
      })
}


function modifier_oiseau(){

let formadata = new FormData();

let id                = document.getElementById("id_oiseau").value;
let nom_oiseau         = document.getElementById("nom_oiseau").value;
let genre_oiseau       = document.getElementById("genre_oiseau").value;
let taille_oiseau      = document.getElementById("taille_oiseau").value;
let age_oiseau         = document.getElementById("age_oiseau").value;
let poids_oiseau       = document.getElementById("poids_oiseau").value;
let prix_oiseau        = document.getElementById("prix_oiseau").value;
let fourure_oiseau     = document.getElementById("fourure_oiseau").value;
let race_oiseau        = document.getElementById("race_oiseau").value;
let cat_oiseau         = document.getElementById("cat_oiseau").value;
let desc_oiseau        = document.getElementById("desc_oiseau").value;
let file_oiseau        = document.getElementById("file_oiseau").files[0]  ; console.log(file_oiseau);
//let filepath =   file_oiseau.name? "exist":"not exist"; console.log(filepath);

var file_path ="";
if(file_oiseau == undefined){
//filepath ="";
file_path = document.getElementById("img_modification").src;
}
let btn_modifier_oiseau = document.getElementById("btn_modifier_oiseau").innerHTML; 

formadata.append('id',id);
formadata.append('nom_oiseau',nom_oiseau);
formadata.append('genre_oiseau',genre_oiseau);
formadata.append('taille_oiseau',taille_oiseau);
formadata.append('age_oiseau',age_oiseau);
formadata.append('poids_oiseau',poids_oiseau);
    formadata.append('prix_oiseau',prix_oiseau);
    formadata.append('fourure_oiseau',fourure_oiseau);
    formadata.append('race_oiseau',race_oiseau);
    formadata.append('cat_oiseau',cat_oiseau);
    formadata.append('file_oiseau',file_oiseau); 
    formadata.append('desc_oiseau',desc_oiseau);
    formadata.append('btn_modifier_oiseau',btn_modifier_oiseau);
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

function supprimer_oiseau(){
let formadata = new FormData();
let id       = document.getElementById("id_oiseau").value; 

let btn_supprimer_oiseau = document.getElementById("btn_supprimer_oiseau").innerHTML;

formadata.append('id',id);
formadata.append('btn_supprimer_oiseau',btn_supprimer_oiseau);

let query = `id=${id}&btn_supprimer_oiseau=${btn_supprimer_oiseau}`;
  
      AjaxRequest("POST","asynchRequest/crudAnimal.php",formadata, ajaxr =>{
        if(ajaxr.responseText != -1 ){
          alert("Suppression reussie")
          console.log(ajaxr.responseText)
        }else{
          alert("Echec d enregistrement")
        }
      })
}
