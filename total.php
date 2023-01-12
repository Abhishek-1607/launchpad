<?php

require 'first.php';
require 'second.php';

echo "First PHP part is opening". "<br>";
$z=new prev\StringMagic("yello");
$z->rev();
echo "<br>";
echo "<br>". "Second PHP part is opening". "<br>";
$r=new pro\StringMagic("yello");
$r->spli();
echo "<br>";


?>