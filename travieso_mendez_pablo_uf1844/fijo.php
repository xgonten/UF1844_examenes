<?php
require_once('./Plantilla.php');

class Fijo extends Plantilla {
  public int $sueldoBase;
  public int $anhosTrabajando;
  public string $sueldoActual;

     /**
   * Constructor de la clase Fijo
   *
   * @param string $nif 
   * @param string $nombre 
   * @param string $apellidos 
   * @param string $fechaIngreso a la empresa en formato 'YYYY/MM/DD'
   */

  public function __construct(
    string $nif, 
    string $nombre, 
    string $apellidos, 
    string $fechaIngreso, 
    ) {
    parent::__construct($nif, $nombre, $apellidos, 'Fijo', $fechaIngreso,);
    $this->anhosTrabajando = $this->calcularAnhosTrabajando();
    $this->sueldoBase = 1200;
    $this->sueldoActual = $this->calcularSueldoActual();
  }

  public function calcularAnhosTrabajando(): int {
    $anhoActual = (int) date('Y');
    return $anhoActual - $this->fechaIngreso->format('Y');
  }

  public function calcularSueldoActual(): int {
    if ($this->anhosTrabajando>=2 && $this->anhosTrabajando<7) {
      return $this->sueldoBase*1.15;
    } elseif ($this->anhosTrabajando>=7) {
      return $this->sueldoBase*1.25;
    } else {
      return $this->sueldoBase;
    }
  }

  public function getSueldoBase(): int {
    return $this->sueldoBase;
  }

  public function setSueldoBase(int $sueldoBase): void {
    $this->sueldoBase = $sueldoBase;
  }
  public function __toString(): string {

    $str = parent::__toString();
    $strFijo = sprintf("Salario base: %d € \nAntiguedad: %d años \nSueldo: %d €\n",
    $this->sueldoBase,  
    $this->anhosTrabajando,
    $this->sueldoActual 
  );

    return $str.$strFijo;
}

  

}


// $pablo= new Fijo('44.828.871-C','Pablo', 'Travieso Méndez', '2015/5/15');
// // $pablo->setFechaIngreso(new DateTime(2012-05-23));
// echo '<pre>';
// echo($pablo->__toString());
