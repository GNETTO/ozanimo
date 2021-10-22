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

//example 
//let o = new once({deb:"inline",fn:"none"}) ; //=> here we return "inline" or "none"
//let [val1, val2] =o.onceAction()  //=> gets the two value 
