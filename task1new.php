<?php
function pre($try){
    $length=strlen($try);
    if($length < 2) {
    echo strtoupper($try);
    }
}
function sec($try){
    $length=strlen($try);
    if ($length >= 2 && false === strpos(trim($try), ' ')) {
        /**
        * check if the string is having length more than 2 and not having any space
        * Then convert this to lower case and print the string
        */
        echo strtolower($try);
        }
    
}
function third($try){
    $length=strlen($try);
    if ($length > 2 && strpos(trim($try), ' ') > 0) {
        /**
        * check if the string is having length more than 2 and having any space
        * Then convert this to sentence case and print the string
        */
        echo ucfirst(strtolower($try));
    }
}
function fiv($param){
    $length=strlen($param);
    if( $length <1 || $param==' ')
    {
        echo "could not read string";
    }
    
}
// get query parameter
$param = isset($_GET['test']) ? $_GET['test'] : 'null';
// get length of string
$length = strlen($param);
// check if the length is less than 2, then convert this to uppercase and print the string
pre($param);
sec($param);
third($param);
fiv($param);
?>