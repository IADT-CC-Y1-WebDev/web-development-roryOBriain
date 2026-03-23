let box = document.getElementById("box");
let toggleBoxBtn = document.getElementById('toggle_box_btn');
let preview = document.getElementById('preview');
let previewInput = document.getElementById('preview_input');

toggleBoxBtn.addEventListener('click', (evt) => {
    toggleBoxVisibility(box);
});

function toggleBoxVisibility(box){
    // console.log(evt.target);
    box.classList.toggle('hidden');
}

previewInput.addEventListener('input', (evt) => {
    updatePreview(preview,evt.target.value);
});

function updatePreview(previewElement, text) {
    // console.log(previewElement,text);
    const trimmed = text.trim();
    
    if(trimmed === ''){
        previewElement.textContent = '(nothing yet)';
        previewElement.classList.add('empty');
    } else {
        previewElement.textContent = trimmed;
        previewElement.classList.remove('empty');
    }
}