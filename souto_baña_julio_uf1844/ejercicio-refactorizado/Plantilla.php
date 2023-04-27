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