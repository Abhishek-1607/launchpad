<?php
trait add{
    public function addition(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
}
trait sub{
    public function subtraction(){
        $this->c=$this->a-$this->b;
        return $this->c;
    }
}
trait mult{
    public function multiplication(){
        $this->c=$this->a*$this->b;
        return $this->c;
    }
}
trait divi{
    public function division(){
        $this->c=$this->a / $this->b;
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
    use add;
}
class B extends A{
    use sub;
}
class C extends B{
    use mult;
}
class D extends C{
    use divi;
}
$x=new D(23,45);
echo "addition is: ". $x->addition(). "<br>";
echo "<br>" . "substraction is: ". $x->subtraction(). "<br>";
echo "<br>" . "multiplication is: ". $x->multiplication(). "<br>";
echo "<br>" . "division is: ". $x->division(). "<br>";
?>