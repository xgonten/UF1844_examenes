<?php

require_once("./Plantilla.php");

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