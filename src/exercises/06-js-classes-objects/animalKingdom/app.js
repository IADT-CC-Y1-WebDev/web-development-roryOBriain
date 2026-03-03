import Cat from './classes/Cat.js';
import Dog from './classes/Dog.js';
import Lion from './classes/Lion.js';
import Wolf from './classes/Wolf.js';

let cat = new Cat("Guppy", 3);
let dog = new Dog("Coco", 5);
let lion = new Lion("Simba", 4);
let wolf = new Wolf("Edward", 6);

// cat.sleep();
// cat.makenoise();
// cat.roam();

// dog.sleep();
// dog.makenoise();
// dog.roam();

// lion.sleep();
// lion.makenoise();
// lion.roam();

// wolf.sleep();
// wolf.makenoise();
// wolf.roam();

let animals = [cat, dog, lion, wolf];

animals.forEach((animal) => {

    // console.log("Name: " + animal.name);

    animal.sleep();
    animal.makenoise();
    animal.roam();

    console.log("==========");
});