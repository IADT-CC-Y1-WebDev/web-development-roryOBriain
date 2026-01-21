<?php

function isValidEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>$email is a valid email address</p>";
    } else {
        echo "<p>$email is not a valid email address</p>";
    }
}

?>