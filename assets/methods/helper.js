
let helper = {};

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


helper.AjaxRequest = function(method, action, query, callback){

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