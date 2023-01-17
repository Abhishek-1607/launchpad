<?php
// get query parameter
$param = isset($_GET['test']) ? $_GET['test'] : 'e';
// get length of string
$length = strlen($param);
// check if the length is less than 2, then convert this to uppercase and print the string
if($length < 2) {
    $chars=str_split($param);
    $result='';
    for($i=0;$i<count($chars);$i++){
        $ch=ord($chars[$i]);
        if($chars[$i]>='a' && $chars[$i]<='z'){
            $result .= $chars($ch-32);
        }
    }
    echo $result;
} elseif ($length >= 2) {
/**
* check if the string is having length more than 2 and not having any space
* Then convert this to lower case and print the string
*/
for($i=0;$i<$length-1;$i++)
{
    if($param[$i]!= ' ')
    {
        $chars=str_split($param);
    $result='';
    for($i=0;$i<count($chars);$i++){
        $ch=ord($chars[$i]);
        if($chars[$i]>='A' && $chars[$i]<='z'){
            $result .= $chars($ch+32);
        }
    }
    echo $result;
    }
}

} elseif ($length > 2 && strpos(trim($param), ' ') > 0) {
/**
* check if the string is having length more than 2 and having any space
* Then convert this to sentence case and print the string
*/
$sentenceCaseString = ucfirst(strtolower($param));
echo $sentenceCaseString;
} else {
echo "Could not understand the string";
}
?>