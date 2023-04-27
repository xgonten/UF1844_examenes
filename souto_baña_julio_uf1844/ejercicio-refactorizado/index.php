<?php

require_once("./Fijo.php");
require_once("./Eventual.php");

$fijo1 = new Fijo("3260089S","Xurxo","Gonzalez",2012);

echo $fijo1;

$fijo2 = new Fijo("3476894F","Lorena","",2016);

echo $fijo2;

$eventual = new Eventual("4943433T","Manolo","",2020);

$eventual->setSalario(2,1);

echo $eventual;