import Feline from "./Feline.js";

class Lion extends Feline {
    constructor(_name, _age){
        super(_name, _age);
    }

    makenoise(){
        console.log("Roaring: ROAR");
    }
}

export default Lion;