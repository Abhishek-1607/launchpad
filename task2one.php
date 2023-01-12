<?php

class calculator{
    public$a,$b,$c;
    function __construct($p,$q)
    {
        $this->a=$p;
        $this->b=$q;
    }
    function add(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
    function subtract(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
}
$p=new calculator(23,45);
echo $p->add();
echo "<br>";
echo $p->subtract();
?>