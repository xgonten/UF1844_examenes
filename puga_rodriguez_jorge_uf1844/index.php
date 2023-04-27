
<?php
abstract class Plantilla {
    protected string $dni;
    protected string $nombre;
    protected ?string $apellidos;
    protected int $anio_ingreso;

    public function __construct($dni, $nombre, $apellidos, $anio_ingreso) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->anio_ingreso = $anio_ingreso;
    }

    function __toString(): string 
  {
    return join(',', [$this->nombre, $this->apellidos, $this->dni,  $this->anio_ingreso]);
  }

  public function getSueldo() {
      $aniosEmpresa = date('Y') - $this->anio_ingreso;
      if ($this instanceof PersonalFijo) {
          $sueldoBase = 1200;
          if ($aniosEmpresa >= 2 && $aniosEmpresa <= 7) {
              return $sueldoBase * 1.15;
          } elseif ($aniosEmpresa >= 7) {
              return $sueldoBase * 1.25;
          } else {
              return $sueldoBase;
          }
      } elseif ($this instanceof PersonalEventual) {
          if ($this->multilenguaje) {
              return 1100;
          } else {
              return 800;
          }
      }
  }
  
}

class PersonalFijo extends Plantilla {
  
  
  function __toString(): string 
  {
    return parent::__toString() . $this->getSueldo();
  }
  

  }
  
class PersonalEventual extends Plantilla {
    protected $multilenguaje;
    public function __construct($dni, $nombre, $apellidos, $anio_ingreso, $multilenguaje=false) {
        parent::__construct($dni, $nombre, $apellidos, $anio_ingreso);
        $this->multilenguaje = $multilenguaje;
    }

    function __toString(): string 
  {
    return parent::__toString() . $this->multilenguaje . $this->getSueldo();
  }
}

$p1 = new PersonalFijo ('3260089S', 'Xurxo', 'Gonzalez', 8);
$p2 = new PersonalFijo ('3476894F', 'Lorena', null, 6);
$p3 = new PersonalEventual ('4943433T', 'Manolo', null, 2020);
echo ($p3);



