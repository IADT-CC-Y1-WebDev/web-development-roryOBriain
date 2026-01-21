<?php

function truncate($text, $length){
    echo substr($text, 0, $length);
    
}
function formatPrice($amnt){
    echo "€$amnt";
}
function getCurrentYear(){
    echo date("Y");
}
?>