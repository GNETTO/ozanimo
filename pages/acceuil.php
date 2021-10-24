<?php ob_start();?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">slider </h1>
        <p class="lead text-muted">Ici slider .</p>
        <p>
          <a href="#" class="btn btn-primary my-2"> action 1</a>
          <a href="#" class="btn btn-secondary my-2">action 2</a>
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


<script>

  // CASH SLIP MANAGEMENT

  let cash_slip_block =  document.getElementById("cash-slip-block");
  let open_slip_btn =  document.getElementById("open-betslip-btn");
  let default_cash_slip_height = "55px" // cash_slip_block.style.height ;
  let cash_total = document.getElementById("total-cash") ;

  open_slip_btn.addEventListener("click", event=>{
    cash_slip_block.style.height= (cash_slip_block.style.height =="450px") ? default_cash_slip_height:"450px"
  });

  let btn_cash_select = document.querySelector(".btn-cash-select");  //all btn to select a product
  let  shopping_cart_no = document.querySelector("#shopping-cart-no");  // product selection indicator
  let counter = parseInt(shopping_cart_no.innerHTML) ;
  //cash-card-block"
  let  cash_card_block = document.querySelector("#cash-card-block");
   
  // delete all selection
  trash_meselection = document.getElementById("trash-meselection");
  trash_meselection.addEventListener("click", event=>{
    document.getElementById("cash-card-block").innerHTML="";
    cash_total.innerHTML = "0 FCFA";
  })

  let Mydoc = function(tag, properties, methods, ...childrens){
    properties = properties || {} ;

    let doc= document.createElement(tag);
    let props = Object.keys(properties); //console.log(props);
    for(let prop of props ){
        doc.setAttribute(prop ,properties[prop] );
    }
    //console.log(childrens.length);
    if(methods) Object.assign(doc,methods);

    for(let child of childrens){

        if(typeof child =="string" || typeof child =="number" ||typeof child =="null"){
            doc.appendChild(document.createTextNode(childrens))
        }else {
            doc.appendChild(child) ;
        }
    }   
    return doc ;
  }

  function cash_b( id, nom, age, prix){

    let payment_block = Mydoc("div",{class:"position-relative p-2 mb-2 bg-light" , id:`${id}_${nom}`},{},
     
      Mydoc("div",{},{},
        Mydoc("img",{src:"assets/solid_svg/trash-alt.svg", width:'10px'},{},"")
      ),
      Mydoc("div",{class:"d-flex justify-content-between"},{},
        Mydoc("div",{},{},"1"),
        Mydoc("div",{},{},`${nom} - ${age} ans`)
      ),
      Mydoc("div",{class:'text-right text-primary '},{},`${prix} FCFA`)
    );
    return payment_block ;
  }
  let total_all_cash = 0 ;
  function lunchCash(elt){
    let isselected = ( elt.getAttribute("data-isselected")  == 0 ? 1:0 ) ;  console.log(isselected)
    //console.log( elt)
    if(isselected == 1){
        console.log(counter);
        counter++;
        shopping_cart_no.innerHTML=counter;
        elt.innerHTML="";
        elt.parentElement.parentElement.parentElement.style.backgroundColor="rgb(135, 250, 135)";
        elt.setAttribute("data-isselected",1);
       
      total_all_cash = total_all_cash + parseInt(elt.getAttribute("data-prix"));
      cash_total.innerHTML = total_all_cash + "FCFA";
      // add selection here
      let c = cash_b(elt.getAttribute("data-produitid"),elt.getAttribute("data-produit"),elt.getAttribute("data-age"),elt.getAttribute("data-prix"));

      cash_card_block.appendChild(c);
    }
    else {
        console.log(counter);
        counter--;
        shopping_cart_no.innerHTML=counter;
        elt.innerHTML="*";
        elt.parentElement.parentElement.parentElement.style.backgroundColor="white";
        elt.setAttribute("data-isselected",0);

        total_all_cash = total_all_cash - parseInt(elt.getAttribute("data-prix"));
        cash_total.innerHTML = total_all_cash + "FCFA";
        // remove selection here
       document.getElementById(elt.getAttribute("data-produitid")+"_"+elt.getAttribute("data-produit")).remove()  ;
        
    }
   
    
  } 

  function valid_cash(){
    
    helper.AjaxRequest("GET","asynchRequest/crudVente.php","", ajaxr =>{
      //let query= new formData();

              if(ajaxr.responseText != -1 ){
                  //document.getElementById("vision-livre").innerHTML=ajaxr.responseText;
                  alert(ajaxr.responseText)
                  
                //alert(ajaxr.responseText)
                console.log(ajaxr.responseText)
              }else{
               // document.getElementById("vision-livre").innerHTML="<div class='bg-danger'> Erreur lors du chargement de donnee</div>";
               console.log("Failure")
              }
            })
  }
    //console.log(elt.parentElement.parentElement.parentElement)
  
  ////let [val1, val2] =o.onceAction()
  //console.log( new once())
</script>
<?php $content=ob_get_clean();  ?>
