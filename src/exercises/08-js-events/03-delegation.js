//console.log("a");

let cardsContainer = document.getElementById('cards');

function handleClicks(evt){
    // console.log(`you clicked on a ${evt.currentTarget.tagName} element`);
    // console.log(`you clicked on a ${evt.target.tagName} element`);

    const card = evt.target.closest('.card');
    if (!card) {
        return;
    }

    const action = evt.target.dataset.action;
    if (action === "select") {
        // console.log("clicked on a select button");
        toggleCardHighlight(card);
    }
    else if (action === "log") {
        // console.log("clicked on a log button");
        logCardTitle(card);
    }
}

function toggleCardHighlight(card){
    card.classList.toggle('selected');
}

function logCardTitle(card){
    console.log('card title: ',card.dataset.title);
}

cardsContainer.addEventListener('click', handleClicks);