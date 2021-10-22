let crudMethodOiseau = {};

crudMethodOiseau.create =function(){
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

crudMethodOiseau.update = function(){
  let id         = document.getElementById("id_oiseau").value;
  let nom_oiseau         = document.getElementById("nom_oiseau").value;
  let genre_oiseau       = document.getElementById("genre_oiseau").value;
  let bruit_oiseau       = document.getElementById("bruit_oiseau").value;
  let prix_oiseau        = document.getElementById("prix_oiseau").value;
  let desc_oiseau        = document.getElementById("desc_oiseau").value;
  let cat_oiseau        = document.getElementById("desc_oiseau").value;
  let file_oiseau        = document.getElementById("file_oiseau").files[0];
  let btn_ajouter_oiseau = document.getElementById("btn_ajouter_oiseau").innerHTML;

  let formadata = new FormData();
      
      var file_path ="";
      if(file_oiseau == undefined){
      //filepath ="";
      file_path = document.getElementById("img_modification_o").src;
      }
      let btn_modifier_oiseau = document.getElementById("btn_modifier_oiseau").innerHTML; 
      
      formadata.append('id',id);
      formadata.append('nom_oiseau',nom_oiseau);
      formadata.append('genre_oiseau',genre_oiseau);
      formadata.append('bruit_oiseau',bruit_oiseau);
      formadata.append('prix_oiseau',prix_oiseau);
      formadata.append('cat_oiseau',cat_oiseau);
      formadata.append('file_oiseau',file_oiseau);
      formadata.append('desc_oiseau',desc_oiseau);
      formadata.append('btn_modifier_oiseau',btn_modifier_oiseau);
      
      
      AjaxRequest("POST","asynchRequest/crudOiseau.php",formadata, ajaxr =>{
              if(ajaxr.responseText != -1 ){
                alert("Mise a jour reussie")
                console.log(ajaxr.responseText)
              }else{
                alert("Echec d enregistrement")
                console.log(ajaxr.responseText)
              }
      })
}

crudMethodOiseau.readFromTab = function(){
  let query ="readOiseau";
    AjaxRequest("GET","asynchRequest/crudOiseau.php",query, ajaxr =>{
        if(ajaxr.responseText != -1 ){
            //alert("Enregistrement reussie")
            /*let tab_tousoiseau =document.getElementById("tab_tousoiseau");
            tab_tousoiseau.innerHTML="";
            tab_tousoiseau.innerHTML= ajaxr.responseText ;*/
           // console.log(ajaxr.responseText);
            ///Adding event 
            //addClickBtnActionOiseau();
        }else{
                alert("Echec d enregistrement")
        }
    })
}


crudMethodOiseau.delete = function(){
  let formadata = new FormData();
  let id       = document.getElementById("id_oiseau").value; 
  
  let btn_supprimer_oiseau = document.getElementById("btn_supprimer_oiseau").innerHTML;

  formadata.append('id',id);
  formadata.append('btn_supprimer_oiseau',btn_supprimer_oiseau);

  let query = `id=${id}&btn_supprimer_oiseau=${btn_supprimer_oiseau}`;
    
        AjaxRequest("POST","asynchRequest/crudOiseau.php",formadata, ajaxr =>{
          if(ajaxr.responseText != -1 ){
            alert("Suppression reussie")
            console.log(ajaxr.responseText)
          }else{
            alert("Echec d enregistrement")
          }
        })
}

function addClickBtnActionOiseau(){

  let btnaction  = document.querySelectorAll(".btn-action-o");  console.log(btnaction)
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
              

          document.getElementById("id_oiseau").value=oneAnimal[0].idoiseau; 
          document.getElementById("nom_oiseau").value=oneAnimal[0].nom;
          document.getElementById("genre_oiseau").value=oneAnimal[0].genre;
          document.getElementById("prix_oiseau").value=oneAnimal[0].prix;
          document.getElementById("cat_oiseau").value=oneAnimal[0].cat;
          document.getElementById("bruit_oiseau").value=oneAnimal[0].bruit;
          document.getElementById("img_modification_o").src=oneAnimal[0].paths;
          document.getElementById("desc_oiseau").value=oneAnimal[0].descs;
                
          console.log( current_btn.getAttribute("data-action") );
          let btn_create = document.getElementById("btn_ajouter_oiseau");
          let btn_modif = document.getElementById("btn_modifier_oiseau") ;
          let btn_supp  = document.getElementById("btn_supprimer_oiseau") ;

          btn_supp.style.display="block";  
          btn_modif.style.display="block";
          btn_create.style.display="block";

               /*document.getElementById("fiche-crud-etudiant").classList.add("bg-primary");
               document.getElementById("fiche-crud-etudiant").classList.add("bg-success");
               document.getElementById("fiche-crud-etudiant").classList.add("bg-danger");*/

        switch( current_btn.getAttribute("data-action")){
           // vision
          case "0" : btn_supp.style.display="none";
                     btn_modif.style.display="none"; 
                     btn_create.style.display="none";

                        /*document.getElementById("fiche-crud-etudiant").innerHTML ="Vision Etudiant(e)";
                        document.getElementById("fiche-crud-etudiant").classList.remove("bg-success");
                        document.getElementById("fiche-crud-etudiant").classList.remove("bg-danger");*/
                    break;

                       // create
          case "1":
                         btn_modif.style.display="none";
                         btn_supp.style.display="none"; 
                         break;
                        // update
          case "2": btn_supp.style.display="none";
                           btn_create.style.display="none";
                      /* document.getElementById("fiche-crud-etudiant").innerHTML ="Modification Etudiant(e)";
                       document.getElementById("fiche-crud-etudiant").classList.remove("bg-primary");
                       document.getElementById("fiche-crud-etudiant").classList.remove("bg-danger");*/

                         break;
                       // delete 
          case "3": btn_modif.style.display="none";
                           btn_create.style.display="none";
                       /*document.getElementById("fiche-crud-etudiant").innerHTML ="Suppression Etudiant(e)";
                       document.getElementById("fiche-crud-etudiant").classList.remove("bg-success");
                         document.getElementById("fiche-crud-etudiant").classList.remove("bg-primary");*/
                      break;
                       

        }

          $('#oiseau-modal').modal({keyboard: true});
          $('#oiseau-modal').modal('show')
        }
      }
                     
      ajaxr.open("GET","asynchRequest/crudOiseau.php?readOne="+event.currentTarget.getAttribute("data-idanimal"));
      ajaxr.send(null); 
    })
  })
}

let crudMethodChien = {};


