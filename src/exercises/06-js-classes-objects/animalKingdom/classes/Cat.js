import Feline from "./Feline.js";

class Cat extends Feline {
    constructor(_name, _age){
        super(_name, _age);
    }

    makenoise(){
        console.log("Meowing: MEOW");
    }
}

export default Cat;