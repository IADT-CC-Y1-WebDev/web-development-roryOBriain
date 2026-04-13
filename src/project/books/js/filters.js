console.log("its connected");

let applyBtn = document.getElementById('apply_filters');
let clearBtn = document.getElementById('clear_filters');

let cards = document.querySelectorAll('.card');
let cardsContainer = document.getElementById('book_cards');

let form = document.getElementById('filters');

form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    applyFilters();
});

applyBtn.addEventListener('click',(evt) =>{
    evt.preventDefault();
    applyFilters();
});

clearBtn.addEventListener('click',(evt) =>{
    evt.preventDefault();
    clearFilters();
});


function applyFilters() {
    console.log("applying filters");
    let filters = getFilters();
    // let matches = [];
    for (let i = 0; i != cards.length; i++){
        let card = cards[i];
        // matches[i]= cardMatches(card,filters);
        let match = cardMatches(card,filters);
        card.classList.toggle('hidden', !match);
    }

    // console.log(matches);
}

// function sortCards(cards, sortBy){
//     const list = cards.slice();
//     list.sort((a, b) => {
//         let titleA = a.dataset.title.toLowerCase();
//         let titleB = b.dataset.title.toLowerCase();
        
//         let yearA = Number(a.dataset.year);
//         let yearB = Number(b.dataset.year);

//         if (sortBy === "year_desc") return yearB - yearA;
//         if (sortBy === "year_asc") return yearA - yearB;

//         return titleA.localeCompare(titleB);
//     });

//     return list;
// }

function cardMatches(crd,fltrs) {
    // console.log(crd.dataset.publisher, fltrs.publisherFilter);
    let title = crd.dataset.title.toLowerCase();
    let publisher = crd.dataset.publisher;
    let formats = crd.dataset.formats;

    let matchTitle = fltrs.titleFilter       === '' || title.includes(fltrs.titleFilter);
    let matchPublisher = fltrs.publisherFilter === '' || publisher.includes(fltrs.publisherFilter);
    let matchFormats = fltrs.formatsFilter === '' || formats.includes(fltrs.formatsFilter);

    return matchTitle && matchPublisher && matchFormats;
}

function getFilters() {
    const titleEl = form.elements['title_filter'];
    const publisherEl = form.elements['publisher_filter'];
    const formatsEl = form.elements['format_filter'];


    let titleFilter = (titleEl.value || '').trim().toLowerCase();
    let publisherFilter = publisherEl.value || '';
    let formatsFilter = formatsEl.value || '';


    return {
        'titleFilter' : titleFilter,
        'publisherFilter' : publisherFilter,
        'formatsFilter' : formatsFilter,
    };
}

function clearFilters() {
    // console.log("clearing filters");

    form.reset();

    cards.forEach(function (card) {
        card.classList.remove('hidden');
    });
}

