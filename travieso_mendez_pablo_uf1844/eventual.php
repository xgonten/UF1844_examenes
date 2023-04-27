<?php
require_once('./Plantilla.php');

class Eventual extends Plantilla {
  public int $websRealizadas;
  public int $multilenguaje;
  public string $sueldo;

     /**
   * Constructor de la clase Fijo
   *
   * @param string $nif 
   * @param string $nombre 
   * @param string $apellidos 
   * @param string $fechaIngreso a la empresa en formato 'YYYY/MM/DD'
   * @param int $websRealizadas 
   * @param int $multilenguaje numero de webs multilenguaje del total de webs realizadas 
   */

  public function __construct(
    string $nif, 
    string $nombre, 
    string $apellidos, 
    string $fechaIngreso, 
    int $websRealizadas,
    int $multilenguaje,
  
    ) {
    parent::__construct($nif, $nombre, $apellidos, 'Eventual', $fechaIngreso);
    $this->websRealizadas = $websRealizadas;
    $this->multilenguaje = $multilenguaje;
    $this->sueldo = $websRealizadas*800 + $multilenguaje*300;
  }

  public function getSueldo(): string {
    return $this->sueldo;
  }
  
  public function setWebsRealizadas(int $websRealizadas): void {
    $this->websRealizadas = $websRealizadas;
    $this->sueldo = $this->websRealizadas * 800 + $this->multilenguaje * 300;
  }
  
  public function setMultilenguaje(int $multilenguaje): void {
    $this->multilenguaje = $multilenguaje;
    $this->sueldo = $this->websRealizadas * 800 + $this->multilenguaje * 300;
  }
  public function __toString(): string {
    $str = parent::__toString();
    $strFijo = "Sueldo: ".$this->sueldo." €"."<pre>";
    return $str.$strFijo
    ;
}

}


// $pablo= new Eventual('44.828.871-C','Pablo', 'Travieso Méndez','2012/05/23', 5, 3);
// echo '<pre>';
// echo($pablo->__toString());
