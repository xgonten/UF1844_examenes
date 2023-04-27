<?php

abstract class Plantilla {
  protected string $dni;
  protected int $anhoIngreso;
  protected string $nombre;
  protected ?string $apellidos;

   function __construct(string $dni, int $anhoIngreso, string $nombre, ?string $apellidos = '') {
    // He añadido una expresión regular para asegurar que al incluir el año de ingreso sea de 4 dígitos obligatoriamente
    
    $expRegAnho = '/^\d{4}$/';
    if(preg_match($expRegAnho, $anhoIngreso)) {
      $this->anhoIngreso = $anhoIngreso;
    } else {
      throw new Exception("El año de ingreso debe ser un número de 4 dígitos");
    }
    $this->dni = $dni;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
  }
    // Getters y setters

    function getDni() {
      return $this->dni;
    }

    function getNombre() {
      return $this->nombre;
    }

    function getApellidos() {
      return $this->apellidos;
    }

    function getAnhoIngreso() {
      return $this->anhoIngreso;
    }

    function setDni($dni) {
      $this->dni = $dni;
    }
  
    function setNombre($nombre) {
      $this->nombre = $nombre;
    }  
  
    function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
    }
    
    function setAnioIngreso($anhoIngreso) {
      $this->anhoIngreso = $anhoIngreso;
    }
}