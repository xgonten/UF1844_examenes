<?php

require_once('./Plantilla.php');


class Fijo extends Plantilla
{
  protected int $salarioBase = 1200;

  function calcularSalario()
  {
    $anoActual = date('Y');
    $antigüedad = $anoActual - $this->fechaIngreso;

    if ($antigüedad <= 2) {
      return $this->salarioBase;
    } else if ($antigüedad >= 2 && $antigüedad <= 7) {
      return $this->salarioBase * 1.15;
    } else {
      return $this->salarioBase * 1.25;
    }
  }

  function dimeAntigüedad()
  {
    $anoActual = date('Y');
    $antigüedad = $anoActual - $this->fechaIngreso;
    return $antigüedad;
  }

  function __toString()
  {
    return sprintf("Fijo<br> Nombre: %s %s <br> id: %s <br> Fecha de Ingreso: %d <br> Salario base: %d € <br> Antigüedad: %d años <br> Sueldo: %d € <br><br>", $this->nombre, $this->apellidos, $this->id, $this->fechaIngreso, $this->salarioBase, $this->dimeAntigüedad(), $this->calcularSalario());
  }
}

class Eventual extends Plantilla
{
  function calcularSalario(int $web, bool $webMultilenguaje)
  {
    $salario = $web * 800;
    if ($webMultilenguaje) {
      $salario += 300;
    }
    return $salario;
  }

  function __toString()
  {
    return sprintf("Eventual<br> Nombre: %s %s <br> DNI: %s <br> Fecha de Ingreso: %d <br> Sueldo: %d € <br><br>", $this->nombre, $this->apellidos, $this->id, $this->fechaIngreso, $this->calcularSalario(3, true));
  }
}

$empleado1 = new Fijo('Xurxo', 'González', '3260089S', 2012);
$empleado2 = new Fijo('Lorena', '', '3476894F', 2014);
$empleado3 = new Eventual('Manolo', '', '4943433T', 2020);
echo $empleado1;
echo $empleado2;
echo $empleado3;
