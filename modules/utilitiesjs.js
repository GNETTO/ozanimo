function zoomOut(elt, scrolleft, scrolltop) {
    if( !scrolleft ) scrolleft=20 ;
    if( !scrolltop ) scrolltop = 60 ;
    elt.addEventListener("mouseover", e=>{
      
        elt.scrollLeft=scrolleft;
        elt.scrollTop=scrolltop;
        elt.style.opacity=0.7
    });
            
    elt.addEventListener("mouseout", e=>{
        elt.scrollLeft=0;
        elt.scrollTop=0;
        elt.style.opacity=1;
    })
}
            
function zoomIn( elt , dimleft =0, dimtop=0 ) {
                
    let leftOffset = elt.scrollWidth - elt.clientWidth ;
    let topOffset = elt.scrollHeight -elt.clientHeight ;
                
    elt.scrollLeft= leftOffset -dimleft;
    elt.scrollTop=topOffset - dimtop;
    elt.style.opacity=0.7
                
    elt.addEventListener("mouseover", e=>{
                    
        elt.scrollLeft=0;
        elt.scrollTop=0;
        elt.style.opacity=1;
    });
            
    elt.addEventListener("mouseout", e=>{
                   
        elt.scrollLeft= leftOffset -dimleft ;
        elt.scrollTop=topOffset - dimtop ;
        elt.style.opacity=0.7
    })
}

    //zoomOut(div)
    //zoomIn(div,250,10)
function once(posibleVal){
        this.posibleVal = posibleVal;
        this.initIncrementVal =-1 ;
}
    
once.prototype.onceAction = function(){
    
    if (this.initIncrementVal%2 == 0 ) {
        this.initIncrementVal++;
        return [this.posibleVal.fn, this.posibleVal.deb] ;
    }else{
            this.initIncrementVal++;
        return [this.posibleVal.deb, this.posibleVal.fn] ;
    }
}
    