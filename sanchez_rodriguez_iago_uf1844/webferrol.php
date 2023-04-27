<?php

abstract class Plantilla {

    protected string $dni;
    protected string $nombre;
    protected ?string $apellidos;
    protected int $anho_ingreso;
    
    function __construct(string $dni,?string $nombre,?string $apellidos,string $ingreso)
    {
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> anho_ingreso = $ingreso;
    }

    function calcularAntiguedad() {
        $anho_actual = date("Y");
        return $anho_actual - $this->anho_ingreso;
    }

    function __toString()
    {
        return 
        "</p>Nombre :".$this->nombre." ".$this->apellidos."</p>".
        "</p>DNI:".$this->dni."</p>".
        "</p>Fecha de Ingreso:".$this->anho_ingreso."</p>";
    }
}


class Fijo extends Plantilla{

    private int $salario_base;
    private int $antiguedad;
    private int $sueldo;

    function __construct(string $dni,string $nombre,?string $apellidos,int $ingreso,int $salario)
    {
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> anho_ingreso = $ingreso;
        $this -> salario_base = $salario;
        $this -> antiguedad = $this->calcularAntiguedad(); 
        $this -> calcularSueldo();
    }


    public function calcularSueldo () {

        if($this -> antiguedad >= 2 && $this -> antiguedad <= 7) {
            $this -> sueldo = $this -> salario_base + $this -> salario_base * 0.15;
        }
        elseif($this -> antiguedad > 7) {
            $this -> sueldo = $this -> salario_base + $this -> salario_base * 0.25;
        }
        else {
            $this -> sueldo = $this -> salario_base;
        }

    }

    function __toString()
    {
        return 
        "<ul>".
        "<li><strong>Fijo</strong></li>".
        "<li>Nombre: ".$this->nombre." ".$this->apellidos."</li>".
        "<li>DNI: ".$this->dni."</li>".
        "<li>Fecha de Ingreso: ".$this->anho_ingreso."</li>".
        "<li>Salario base: ".$this->salario_base." €</li>".
        "<li>Antigüedad: ".$this->antiguedad." años </li>".
        "<li>Sueldo: ".$this->sueldo." €</li>".
        "</ul>";
    }
}

class Eventual extends Plantilla {

    private int $webs;
    private int $webs_m;
    private int $sueldo;

    function __construct(string $dni,string $nombre,?string $apellidos,int $ingreso,?int $webs,?int $webs_m)
    {
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> anho_ingreso = $ingreso;
        $this -> webs = $webs;
        $this -> webs_m = $webs_m;
        $this -> calcularSueldoEvent();
    }

    public function calcularSueldoEvent() {

        $this -> sueldo = $this -> webs * 800 + $this -> webs_m * 1100;

    }

    function __toString()
    {
        return 
        "<ul>".
        "<li><strong>Eventual</strong></li>".
        "<li>Nombre: ".$this->nombre." ".$this->apellidos."</li>".
        "<li>DNI: ".$this->dni."</li>".
        "<li>Fecha de Ingreso: ".$this->anho_ingreso."</li>".
        "<li>Sueldo: ".$this->sueldo." €</li>".
        "</ul>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    ul {
        list-style: none;
        padding: 0;
    }
    </style>
</head>
<body>
    <?php
        $f1 = new Fijo("3260089S","Xurxo","González",2012,1200);
        echo $f1->__toString();
        $f2 = new Fijo("3476894F","Lorena",null,2020,1200);
        echo $f2->__toString();
        $e1 = new Eventual("4943433T","Manolo",null,2020,2,1);
        echo $e1->__toString();
	?>
</body>
</html>