<?php 

require_once("./Plantilla.php");

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