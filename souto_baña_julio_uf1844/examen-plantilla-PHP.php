<?php

abstract class Plantilla{
  protected string $DNI;
  protected string $nombre;
  protected string $apellidos;
  protected int $anoIngreso;

  function __construct(string $dni, string $nombre, string $apellidos, int $ano)
  {
    $this->DNI = $dni;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->anoIngreso = $ano;
  }

  function __toString():string
  {
    return "Nombre: ".$this->nombre." ".$this->apellidos."<br>DNI: ".$this->DNI."<br>Fecha ingreso: ".$this->anoIngreso;
  }
}

define("BASE",1200);

class Fijo extends Plantilla{
  private float $salario;
  private int $antiguedad;

  function __construct(string $dni, string $nombre, string $apellidos, int $ano)
  {
    parent::__construct($dni,$nombre,$apellidos,$ano);
    $this->setSalario();
  }

  function setAntiguedad(){
    $anoActual = (int) (new DateTime())->format("Y");
    $this->salario = BASE;
    $this->antiguedad = $anoActual - $this->anoIngreso;
  }

  function getAntiguedad():int{
    return $this->antiguedad;
  }

  //metodo "obtener salario"
  function setSalario(){
    $this->setAntiguedad();
    if($this->antiguedad>=2 && $this->antiguedad<=7)
      $this->salario = $this->salario * 1.15;
    else if($this->antiguedad > 7)
      $this->salario = $this->salario * 1.25;
  }
  
  function getSalario ():float{
    return $this->salario;
  }
  
  function __toString(): string
  {
    return "<br><strong>".static::class."</strong><br>".parent::__toString()."<br>Salario base: ".BASE." €<br>Antigüedad: ".$this->getAntiguedad()." años<br>Sueldo: ".$this->getSalario()." €";
  }
}

class Eventual extends Plantilla{
  private float $salario = 0;
  private int $webs;
  private int $multilenguaje;

  function __construct(string $dni, string $nombre, string $apellidos, int $ano)
  {
    parent::__construct($dni,$nombre,$apellidos,$ano);
  }

  //metodo "obtener salario"
  function setSalario (int $webs, int $multilenguaje){
    $this->salario += 1100*$multilenguaje;
    $this->salario += 800*$webs;
    $this->webs=$webs+$multilenguaje;
    $this->multilenguaje=$multilenguaje;
  }

  function getSalario ():float{
    return $this->salario;
  }

  function getWebs():int{
    return $this->webs;
  }

  function getMultilenguaje():int{
    return $this->multilenguaje;
  }

  function __toString(): string
  {
    return "<br><strong>".static::class."</strong><br>".parent::__toString()."<br>Salario: ".$this->getSalario()." €<br>Webs realizadas: ".$this->getWebs()."<br>De las cuales multilenguaje: ".$this->getMultilenguaje();
  }
}

$fijo1 = new Fijo("3260089S","Xurxo","Gonzalez",2012);

echo $fijo1;

$fijo2 = new Fijo("3476894F","Lorena","",2016);

echo $fijo2;

$eventual = new Eventual("4943433T","Manolo","",2020);

$eventual->setSalario(2,1);

echo $eventual;
