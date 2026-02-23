<?php
    require_once 'php/lib/config.php';


// this prints out "PDO Object() meaning that the pdo object does exist!
    // print_r($db = DB::getInstance()->getConnection());

// testing different methods
    // $db = DB::getInstance()->getConnection();
    // echo "<p>";
    // print_r($books = Book::findAll());
    // echo "</p><br><p>";
    // print_r($bookById = Book::findById(2));
    // echo "</p>";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'php/inc/head_content.php'; ?>
        <title>Book index</title>
    </head>
    <body>
        <div class="container">
            <h1 class="width-12">Book Index</h1>
            <p class="width-12"><a href="book_list.php">View all books</a></p>
        </div>
    </body>
</html>