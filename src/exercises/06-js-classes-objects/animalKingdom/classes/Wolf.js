import Canine from "./Canine.js";

class Wolf extends Canine {
    constructor(_name, _age){
        super(_name, _age);
    }

    makenoise(){
        console.log("Howling: AROOO");
    }
}

export default Wolf;