<?php
function pre($try){
    return strtoupper($try);
}
function sec($try){
    return strtolower($try);
}
function third($try){
    return ucfirst($try);
}
function fiv(){
    return "could not read string";
}
// get query parameter
$param = isset($_GET['test']) ? $_GET['test'] : 'null';
// get length of string
$length = strlen($param);
// check if the length is less than 2, then convert this to uppercase and print the string
if($length < 2) {
$upperCaseString = pre($param);
echo $upperCaseString;
} elseif ($length >= 2 && false === strpos(trim($param), ' ')) {
/**
* check if the string is having length more than 2 and not having any space
* Then convert this to lower case and print the string
*/
$lowerCaseString = sec($param);
echo $lowerCaseString;
} elseif ($length > 2 && strpos(trim($param), ' ') > 0) {
/**
* check if the string is having length more than 2 and having any space
* Then convert this to sentence case and print the string
*/
$sentenceCaseString = third(pre($param));
echo $sentenceCaseString;
} else {
    $rea=fiv();
    echo $rea;
}
?>