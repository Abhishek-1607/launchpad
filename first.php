<?php
namespace prev;
class StringMagic{
    public $a,$c;
    function __construct($q)
    {
        $this->a=$q;
    }
    function rev(){
        $this->c=strrev($this->a);
        echo $this->c;
    }
}
?>