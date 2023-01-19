<?php

interface A{
    function addition();
}
interface B{
    function subtraction();
}
interface C{
    function multiplication();
}
interface D{
    function division();
}
class E implements A,B,C,D{
    public $a,$b,$c;
    function __construct($p,$q)
    {
        $this->a=$p;
        $this->b=$q;
    }
    public function addition(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
    public function subtraction()
    {
        $this->c=$this->a-$this->b;
        return $this->c;
    }
    public function multiplication()
    {
        $this->c=$this->a*$this->b;
        return $this->c;
    }
    public function division(){
        $this->c=$this->a / $this->b;
        return $this->c;
    }
}
// creating object
$p=new E(34,21);
echo "Sum of the number is: ";
echo $p->addition();
echo "<br>". "substraction of the number is: ";
echo $p->subtraction();
echo "<br>". "Multiplication of the number is: ";
echo $p->multiplication();
echo "<br>". "division of the number is: ";
echo $p->division();


?>
