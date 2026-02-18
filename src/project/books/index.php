<?php
    require_once 'php/lib/config.php';

    echo("test");

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