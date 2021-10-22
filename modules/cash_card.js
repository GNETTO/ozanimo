

function cash_card(opt){
    
    if(!opt) opt ={ label:'date de Naissance',errorIcons: '',id:'datenaissance'};
    let doc ='' ;
    let dateObject = new Date(this.BEGIN_DATE) ; console.log(dateObject.getMonth())
    let message = {
        validDate:`La date ne doit commencé  a partir du   ${dateObject.getUTCDate()} ${helper.MonthString()[dateObject.getMonth()] }-${dateObject.getFullYear()} `,
        fausseDate:"Cette date est invalide , veuiller la changée"
    } ;
     let that = this ;
     
     doc = helper.createDoc("div",{class:"input-container"},{},
             helper.createDoc("div",{class:"input-group"},{},
                 helper.createDoc("div", {class:"label"},{},opt.label),
 
                 helper.createDoc("div",{class:"input-area-block"},{},
                     helper.createDoc("input",{type:"date",class:"text-input","data-error-date1":message.validDate, id:opt.id},{oninput:EventInput}),
                     helper.createDoc("div",{class:"input-icons-block"},{},
                         helper.createDoc("img",{class:"icons-item",src:opt.errorIcons},{})
                     )
                 )
             ),
     
             helper.createDoc("div",{class:"error-msg-block"},{})
         )
         this.REGISTRATION_BLOCK.appendChild(doc);
 
     function EventInput(e){
         
         let input_elt = e.currentTarget ;
         let input_value = input_elt.value
         let error_block = e.currentTarget.parentNode.parentNode.nextSibling;
         let icons =  input_elt.nextSibling.children[0]; console.log(icons)
         
         let dateDebut = new Date(that.BEGIN_DATE) ;console.log(dateDebut) ;
         let selectedDate = new Date(e.currentTarget.value) ; 
         error_block.innerHTML ="";
         icons.style.display = "none";
         if(selectedDate < dateDebut ){
                 error_block.appendChild(helper.createDoc("p",{class:"error-text"},{},input_elt.getAttribute("data-error-date1")));
                 icons.style.display="block"
         }
         that.unlockValidationBtn(e) 
     }
     this.REGISTRATION_BLOCK.appendChild(doc)
 }
 