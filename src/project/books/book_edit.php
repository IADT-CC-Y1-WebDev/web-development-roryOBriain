<?php
require_once 'php/lib/config.php';
require_once 'php/lib/session.php';
require_once 'php/lib/forms.php';
require_once 'php/lib/utils.php';

startSession();

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        throw new Exception('Invalid request method.');
    }
    if (!array_key_exists('id', $_GET)) {
        throw new Exception('No game ID provided.');
    }
    $id = $_GET['id'];

    $book = Book::findById($id);
    if ($book === null) {
        throw new Exception("Book not found.");
    }

    $bookFormats = Format::findByBook($book->id);
    $bookFormatsIds = [];
    foreach ($bookFormats as $format) {
        $bookFormatsIds[] = $format->id;
    }

    $publishers = Publisher::findAll();
    $formats = Format::findAll();
}
catch (PDOException $e) {
    setFlashMessage('error', 'Error: ' . $e->getMessage());
    redirect('/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'php/inc/head_content.php'; ?>
        <title>View Book</title>
    </head>
    <body>
        <div class="container">
            <div class="width-12">
                <?php require 'php/inc/flash_message.php'; ?>
            </div>
            <div class="width-12">
                <h1>Edit Book</h1>
            </div>
            <div id="error_summary_top" class="error-summary width-12" style="display:none" role="alert"></div>
            <div class="width-12">
                <form id="book_form" action="book_update.php" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="input">
                        <input type="hidden" name="id" value="<?= h($book->id) ?>">
                    </div>
                    <div class="input">
                        <label class="special" for="title">Title:</label>
                        <div>
                            <input type="text" id="title" name="title" value="<?= old('title', $book->title) ?>" required required  data-minlength="1" data-maxlength="255">
                            <p><?= error('title') ?></p>
                            <p id="title_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special" for="author">Author:</label>
                        <div>
                            <input type="text" id="author" name="author" value="<?= old('author', $book->author) ?>" required data-minlength="5" data-maxlength="255">
                            <p><?= error('author') ?></p>
                            <p id="author_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special" for="publisher_id">Publisher:</label>
                        <div>
                            <select id="publisher_id" name="publisher_id" required>
                                <?php foreach ($publishers as $publisher) { ?>
                                    <option value="<?= h($publisher->id) ?>" <?= chosen('publisher_id', $publisher->id, $book->publisher_id) ? "selected" : "" ?>>
                                        <?= h($publisher->name) ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <p><?= error('publisher_id') ?></p>
                            <p id="publisher_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special" for="year">Release Year:</label>
                        <div>
                            <input type="number" id="year" name="year" min="1700" max="2099" step="1" value="<?= old('year', $book->year) ?>" required data-minlength="4" data-maxlength="4" data-maxvalue="2099" data-minvalue="1700">
                            <p><?= error('year') ?></p>
                            <p id="year_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special" for="isbn">ISBN:</label>
                        <div>
                            <input type="text" id="isbn" name="isbn" value="<?= old('isbn', $book->isbn) ?>"  required data-minlength="13" data-maxlength="15">
                            <p><?= error('isbn') ?></p>
                            <p id="isbn_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special" for="description">Description:</label>
                        <div>
                            <textarea id="description" name="description" required data-minlength="10" data-maxlength="5000"><?= old('description', $book->description) ?></textarea>
                            <p><?= error('description') ?></p>
                            <p id="description_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <label class="special">Formats:</label>
                        <div>
                            <?php foreach ($formats as $format) { ?>
                                <div>
                                    <input type="checkbox" 
                                        id="format_<?= h($format->id) ?>" 
                                        name="format_ids[]" 
                                        value="<?= h($format->id) ?>"
                                        <?= chosen('format_ids', $format->id, $bookFormatsIds) ? "checked" : "" ?>
                                        >
                                    <label for="format_<?= h($format->id) ?>"><?= h($format->name) ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <p><?= error('format_ids') ?></p>
                        <p id="format_error"></p>
                    </div>
                    <div class="input">
                        <label class="special" for="cover_filename">Image (optional):</label>
                        <div><img src="images/<?= $book->cover_filename ?>" /></div>
                        <div>
                            <input type="file" id="cover_filename" name="cover_filename" accept="image/*" data-optional="true">
                            <p><?= error('cover_filename') ?></p>
                            <p id="cover_filename_error"></p>
                        </div>
                    </div>
                    <div class="input">
                        <button id="submit_btn" class="button" type="submit">Update Book</button>
                        <div class="button"><a href="book_list.php">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/formCheck.js"></script>
    </body>
</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors();
?>