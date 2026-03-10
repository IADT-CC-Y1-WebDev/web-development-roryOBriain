// let p = document.createElement('p');
// p.innerHTML = "this is a <strong>paragraph !</strong>";
// document.body.appendChild(p);


let myBtn = document.getElementById('myButton');

function addParagraph(){
    let p = document.createElement('p');
    p.innerHTML = document.getElementById('title').value;
    document.body.appendChild(p);
}

myBtn.addEventListener('click',addParagraph);
title.addEventListener('keyup',function(e){
    // console.log(e.key);
    if (e.key === 'Enter') {
        addParagraph();
    }
})