<?php

require_once ('./fijo.php');
require_once ('./eventual.php');

$Xurxo = new Fijo('3260089S', 'Xurxo', 'González','2015/12/06');
$Lorena = new Fijo('3476894F', 'Lorena', '','2017/05/15');
$Manolo = new Eventual('4943433T', 'Manolo', '', '2020/01/02',3,1);
echo "<pre>";
echo($Xurxo->__toString());
echo($Lorena->__toString());
echo($Manolo->__toString());

