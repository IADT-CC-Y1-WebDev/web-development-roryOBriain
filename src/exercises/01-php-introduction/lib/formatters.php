<?php
function formatPhoneNumber($number){
    if(strlen($number)==10){
        echo "<p>Assuming Irish phone number, this number is for local calls as it has extra 0 before area code.<br>";
        $number = substr_replace($number, " ", -4, 0);
        $number = substr_replace($number, " ", 3, 0);
        echo "Formatted phone number: $number</p>";

    }
    else if(strlen($number)==9){
        echo "<p>Assuming +353 extension as area code is missing first digit.<br>";
        $number = substr_replace($number, " ", -4, 0);
        $number = substr_replace($number, " ", 2, 0);
        echo "Formatted phone number: +353 $number</p>";
    }
    else{
        echo "invalid phone number \"$number\". Please use format xxx-xxx-xxxx or xx-xxx-xxxx";
    }
}


?>