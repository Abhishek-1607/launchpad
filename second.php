<?php
namespace pro;

class StringMagic{
    public $a;
    function __construct($q)
    {
        $this->a=$q;
    }
    public function spli(){
        $arr=str_split($this->a);
        for($i=0;$i<count($arr);$i++){
            echo $i . "  " . $arr[$i];
            echo "<br>";
        }
    }
}
// $y=new StringMagic("Hello");
?>
