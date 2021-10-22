let helper = {};

helper.AjaxRequest = function(method, ajaxr, action, query ){

    return new Promise( (resolve, reject)=>{

        ajaxr.open(method,`${action}?${query}`);
        ajaxr.send(null);
        resolve(ajaxr)
        }
    )
}

helper.checkAjaxOject = function(){
    return new Promise( (resolve, reject)=>{
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
                    //alert("La connexion Ajax a échoué .")
                    reject(ajaxr);
                }
            }
        }
        resolve(ajaxr);

    })
}


/*async function parallel() {
    console.log('==PARALLEL with await Promise.all==')
  
    // Start 2 "jobs" in parallel and wait for both of them to complete
    await Promise.all([
        (async()=>console.log(await resolveAfter2Seconds()))(),
        (async()=>console.log(await resolveAfter1Second()))()
    ])
  }*/


 /* helper.ajaxRequest = async function(){

      await Promise.all([
          async ()=>{
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
                        //alert("La connexion Ajax a échoué .")
                        reject(ajaxr);
                    }
                }
            }
          }
      ])
  }*/