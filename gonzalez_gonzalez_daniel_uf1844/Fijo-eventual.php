<?php

require_once('./Plantilla.php');

class Fijo extends Plantilla {
  protected int $salarioBase = 1200;

  function calcularSalario() {
    $anhoActual = date('Y');
    $antigüedad = $anhoActual - $this->anhoIngreso;

    if ($antigüedad < 2) {
      return $this->salarioBase;
    } else if ($antigüedad >= 2 && $antigüedad <= 7) {
      return $this->salarioBase * 1.15;
    } else {
      return $this->salarioBase * 1.25;
    }
  }

  function dimeAntigüedad() {
    $anhoActual = date('Y');
    $antigüedad = $anhoActual - $this->anhoIngreso;
    return $antigüedad;
  }

  function __toString()
  {
    return sprintf("<strong>Fijo</strong> <br> Nombre: %s %s <br> DNI: %s <br> Fecha de Ingreso: %d <br> Salario base: %d € <br> Antigüedad: %d años <br> Sueldo: %d € <br>", $this->nombre, $this->apellidos, $this->dni, $this->anhoIngreso, $this->salarioBase, $this->dimeAntigüedad(), $this->calcularSalario());
  }
}

class Eventual extends Plantilla {
  function calcularSalario(int $numWebs, bool $esMultilenguaje) {
    $salario = $numWebs * 800;
    if ($esMultilenguaje) {
      $salario += 300;
    }
    return $salario;
  }

  function __toString()
  {
    return sprintf("<strong>Eventual</strong> <br> Nombre: %s %s <br> DNI: %s <br> Fecha de Ingreso: %d <br> Sueldo: %d € <br>", $this->nombre, $this->apellidos, $this->dni, $this->anhoIngreso, $this->calcularSalario(3, true)); 
    // En calcularSalario() el número de webs que he puesto como ejemplo ha sido de 3 (según el número que se indique variará el salario) y he puesto que sí es multilenguaje (también afecta al salario). Esto puede modificarse a conveniencia.
  }
}

$fijo1 = new Fijo('32600899S', 2015, 'Xurxo', 'González');
$fijo2 = new Fijo('34768944F', 2017, 'Lorena');
$eventual1 = new Eventual('49434333T', 2020, 'Manolo');

echo $fijo1;
echo $fijo2;
echo $eventual1;
// echo 'El salario el contrato eventual de '. $eventual1->getNombre() .' haciendo 6 webs multilenguaje (en lugar de 3) sería de '. $eventual1->calcularSalario(6, true). ' €';
