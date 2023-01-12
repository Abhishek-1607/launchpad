<?php
trait test{
    public function division(){
        $this->c=$this->a/$this->b;
        return $this->c;
    }
}
class A{
    public $a,$b,$c;
    function __construct($p,$q)
    {
        $this->a=$p;
        $this->b=$q;
    }
    use test;
}
$x=new A(34,2);
echo "Division of the number is : ";
echo $x->division() . "<br>";



?>