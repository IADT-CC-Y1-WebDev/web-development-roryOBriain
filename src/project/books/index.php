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
        <link rel="stylesheet" href="/examples/css/style.css">

        <title>Book index</title>

    </head>
    <body>
        <h1>Web Development Capstone Project</h1>
        <br>
        <div class="nav-links">
            <a href="../../index.php">Back to Index</a>
            <a href="instructions.php">Instructions</a>
            <a href="book_list.php">View Book List</a>
            <a href="book_create.php">Add Book</a>
        </div>
        <div class="topic">
            <h3>Book CRUD Application</h2>
            <p>This application is a CRUD (Create Read Update Delete) application that uses php to access an SQL database.</p>
            <p>The links above lead to the application, thank you for reading :-)</p>
        </div>
        
    </body>
</html>