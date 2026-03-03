import Canine from "./Canine.js";

class Dog extends Canine {
    constructor(_name, _age){
        super(_name, _age);
    }

    makenoise(){
        console.log("Barking: WOOF");
    }
}

export default Dog;