<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>

  let cash_slip_block =  document.getElementById("cash-slip-block");
  let open_slip_btn =  document.getElementById("open-betslip-btn");
  let default_cash_slip_height = "55px" // cash_slip_block.style.height ;

  open_slip_btn.addEventListener("click", event=>{
    cash_slip_block.style.height= (cash_slip_block.style.height =="600px") ? default_cash_slip_height:"600px"
  });

  let btn_cash_select = document.querySelector(".btn-cash-select");  //all btn to select a product
  let  shopping_cart_no = document.querySelector("#shopping-cart-no");  // product selection indicator
  let counter = parseInt(shopping_cart_no.innerHTML) ;
  //cash-card-block"
  let  cash_card_block = document.querySelector("#cash-card-block");

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
      Mydoc("div",{class:'align-right'},{},`${prix} FCFA`)
    );
    return payment_block ;
  }
 
  /*
   Mydoc("div",{},{},
        Mydoc("img",{class:"position-absolute",src:""},{},"")
        ),
  * */

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
    }
    else {
        console.log(counter);
        counter--;
        shopping_cart_no.innerHTML=counter;
        elt.innerHTML="*";
        elt.parentElement.parentElement.parentElement.style.backgroundColor="white";
        elt.setAttribute("data-isselected",0);
    }
    let c = cash_b(elt.getAttribute("data-produitid"),elt.getAttribute("data-produit"),elt.getAttribute("data-age"),elt.getAttribute("data-prix"));
    cash_card_block.appendChild(c);
    
  } 
    //console.log(elt.parentElement.parentElement.parentElement)
  
  ////let [val1, val2] =o.onceAction()
  //console.log( new once())
</script>