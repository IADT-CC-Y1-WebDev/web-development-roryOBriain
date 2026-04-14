let submitBtn = document.getElementById('submit_btn');
let bookForm = document.getElementById('book_form');
let errorSummaryTop = document.getElementById('error_summary_top');

let titleInput = document.getElementById('title');
let authorInput = document.getElementById('author');
let publisherIdInput = document.getElementById('publisher_id');
let yearInput = document.getElementById('year');
let isbnInput = document.getElementById('isbn');
let descriptionInput = document.getElementById('description');
let formatIdsInput = document.getElementsByName('format_ids[]');
let coverFilenameInput = document.getElementById('cover_filename');

let titleError = document.getElementById('title_error');
let authorError = document.getElementById('author_error');
let publisherError = document.getElementById('publisher_error');
let yearError = document.getElementById('year_error');
let isbnError = document.getElementById('isbn_error');
let descriptionError = document.getElementById('description_error');
let formatIdsErrors = document.getElementById('format_error');
let coverFilenameError = document.getElementById('cover_filename_error');
let errors = {};

// submitBtn.addEventListener('click', onSubmitForm);

function addError(fieldName, message) {
    errors[fieldName] = message;
}

function showErrorSummaryTop() {
    const messages = Object.values(errors);
    if (messages.length === 0) {
        errorSummaryTop.style.display = 'none';
        errorSummaryTop.innerHTML = '';
        return;
    }
    errorSummaryTop.innerHTML =
        '<strong>Please fix the following:</strong><ul>' +
        messages
            .map(function (m) {
                return '<li>' + m + '</li>';
            })
            .join('') +
        '</ul>';
    errorSummaryTop.style.display = 'block';
}

function showFieldErrors() {
    titleError.innerHTML = errors.title || '';
    authorError.innerHTML = errors.author || '';
    publisherError.innerHTML = errors.publisher || '';
    yearError.innerHTML = errors.year || '';
    isbnError.innerHTML = errors.isbn || '';
    descriptionError.innerHTML = errors.description || '';
    formatIdsErrors.innerHTML = errors.format_ids || '';
    coverFilenameError.innerHTML = errors.cover_filename || '';

}

function isRequired(value) {
    return String(value).trim() !== '';
}

function isMinLength(value, min) {
    return String(value).trim().length >= min;
}

function isMaxLength(value, max) {
    return String(value).trim().length <= max;
}

function onSubmitForm(evt) {
    evt.preventDefault();

    errors = {};

    const titleMin = Number(titleInput.dataset.minlength || 1);
    const titleMax = Number(titleInput.dataset.maxlength || 255);

    const authorMin = Number(authorInput.dataset.minlength || 5);
    const authorMax = Number(authorInput.dataset.maxlength || 255);

    const yearMinValue = Number(yearInput.dataset.minvalue || 1700);
    const yearMaxValue = Number(yearInput.dataset.maxvalue || 2099);
    const yearMinLength = Number(yearInput.dataset.minlength || 4);
    const yearMaxLength = Number(yearInput.dataset.maxlength || 4);

    const descMin = Number(descriptionInput.dataset.minlength || 10);
    const descMax = Number(descriptionInput.dataset.maxlength || 5000);
    
    const isbnMin = Number(isbnInput.dataset.minlength || 13);
    const isbnMax = Number(isbnInput.dataset.maxlength || 15);

    //     'title' => 'required|notempty|min:1|max:255',
    //     'author' => 'required|notempty|min:5|max:255',
    //     'year' => 'required|notempty',
    //     'publisher_id' => 'required|integer',
    //     'isbn' => 'required|notempty|min:13|max:15',
    //     'description' => 'required|notempty|min:10|max:5000',
    //     'format_ids' => 'required|array|min:1|max:10',
    //     'cover_filename' => 'required|notempty|file|image|mimes:jpg,jpeg,png|max_file_size:5242880'
    
    // title
    if (!isRequired(titleInput.value)) {
        addError('title', 'Title is required.');
    } else if (!isMinLength(titleInput.value, titleMin)) {
        addError(
            'title',
            'Title must be at least ' + titleMin + ' characters.'
        );
    } else if (!isMaxLength(titleInput.value, titleMax)) {
        addError('title', 'Title must be at most ' + titleMax + ' characters.');
    }

    // author
    if (!isRequired(authorInput.value)) {
        addError('author', 'Author is required.');
    } else if (!isMinLength(authorInput.value, authorMin)) {
        addError(
            'author',
            'Author must be at least ' + authorMin + ' characters.'
        );
    } else if (!isMaxLength(authorInput.value, authorMax)) {
        addError('author', 'Author must be at most ' + authorMax + ' characters.');
    }
    //year
    if (!isRequired(yearInput.value)) {
        addError('year', 'Year is required.');
    } else if (isNaN(yearInput.value)) {
        addError('year', 'Year must be a number.');
    } else if (!isMinLength(yearInput.value, yearMinLength)) {
        addError('year', 'Year must be at least ' + yearMinLength + ' digits.');
    } else if (!isMaxLength(yearInput.value, yearMaxLength)) {
        addError('year', 'Year must be at most ' + yearMaxLength + ' digits.');
    } else if (Number(yearInput.value) < yearMinValue || Number(yearInput.value) > yearMaxValue) {
        addError('year', 'Year must be between ' + yearMinValue + ' and ' + yearMaxValue + '.');
    }

    // publisher_id
    if (!isRequired(publisherIdInput.value)) {
        addError('publisher_id', 'Publisher is required.');
    }

    //isbn
    if(!isRequired(isbnInput.value)){
        addError('isbn', 'ISBN is required.');
    } else if (!isMinLength(isbnInput.value, isbnMin)) {
        addError(
            'isbn',
            'ISBN must be at least ' + isbnMin + ' characters.'
        );
    } else if (!isMaxLength(isbnInput.value, isbnMax)) {
        addError('isbn', 'ISBN must be at most ' + isbnMax + ' characters.');
    }


    // description
    if (!isRequired(descriptionInput.value)) {
        addError('description', 'Description is required.');
    } else if (!isMinLength(descriptionInput.value, descMin)) {
        addError(
            'description',
            'Description must be at least ' + descMin + ' characters.'
        );
    } else if (!isMaxLength(descriptionInput.value, descMax)) {
        addError('description', 'Description must be at most ' + descMax + ' characters.');
    }

    // format_ids
    let formatChecked = false;
    for (let i = 0; i < formatIdsInput.length; i++) {
        if (formatIdsInput[i].checked) {
            formatChecked = true;
            break;
        }
    }
    if (!formatChecked) {
        addError('format_ids', 'Select at least one format.');
    }

    // cover_filename
    if (!coverFilenameInput.files || coverFilenameInput.files.length === 0) {
        if (coverFilenameInput.dataset.optional !== 'true') {
            addError('cover_filename', 'Cover image is required.');
        }
    }

    showErrorSummaryTop();
    showFieldErrors();

    if (Object.keys(errors).length === 0) {
        alert(
            'Form is valid, uploading . . .'
        );
        book_form.submit();
    }
}
