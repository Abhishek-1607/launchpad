<?php

class first{
    public $a,$b,$c;
    function __construct($p,$q)
    {
        $this->a=$p;
        $this->b=$q;
    }
    function sum(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
}
class second extends first{
    function subtract(){
        $this->c=$this->a-$this->b;
        return $this->c;
    }
}
class third extends second{
    function mult(){
        $this->c=$this->a*$this->b;
        return $this->c;
    }
}
class four extends third{
    function divide(){
        $this->c=$this->a/$this->b;
        return $this->c;
    }
}
// creating object
$x=new first(45,87);
echo "First message is : " . "<br>";
echo "Sum of the number is: ";
echo  $x->sum();
$y=new second(45,56);
echo "<br>" . "Second message is : " . "<br>";
echo "Sum of the number is: ";
echo $y->sum();
echo "<br>" . "Substraction of the number is: ";
echo $y->subtract();
$z=new third(32,87);
echo "<br>" . "Third message is : " . "<br>";
echo "Sum of the number is: ";
echo $z->sum();
echo "<br>" . "Substraction of the number is: ";
echo $z->subtract();
echo "<br>" . "Multiplication of the number is: ";
echo $z->mult();
$w=new four(45,90);
echo "<br>" . "Four message is : " . "<br>";
echo "Sum of the number is: ";
echo $w->sum();
echo "<br>" . "Substraction of the number is: ";
echo $w->subtract();
echo "<br>" . "Multiplication of the number is: ";
echo $w->mult();
echo "<br>" . "Divide of the number is: ";
echo $w->divide();
?>
