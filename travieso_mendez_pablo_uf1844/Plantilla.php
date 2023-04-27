<?php


class Plantilla {
  public string $nif;
  public string $nombre;
  public string $apellidos;
  public DateTime $fechaIngreso;
  public string $categoria;

   /**
   * Constructor de la clase Plantilla
   *
   * @param string $nif 
   * @param string $nombre 
   * @param string $apellidos 
   * @param string $fechaIngreso  a la empresa en formato 'YYYY/MM/DD'
   * @param string $categoria Fijo o Eventual (se definira automaticamente en los hijos)
   */
  public function __construct(
    string $nif, 
    string $nombre, 
    string $apellidos, 
    string $categoria,
    string $fechaIngreso, 
    ) {
    $this->nif = $nif;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->fechaIngreso = DateTime::createFromFormat('Y/m/d', $fechaIngreso);
    $this->categoria = $categoria;
  }

  public function getNif(): string {
    return $this->nif;
  }

  public function setNif(string $nif): void {
    $this->nif = $nif;
  }

  public function getNombre(): string {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void {
    $this->nombre = $nombre;
  }

  public function getApellidos(): string {
    return $this->apellidos;
  }

  public function setApellidos(string $apellidos): void {
    $this->apellidos = $apellidos;
  }

  public function getFechaIngreso(): DateTime {
    return $this->fechaIngreso;
  }

  public function setFechaIngreso(DateTime $fechaIngreso): void {
    $this->fechaIngreso = $fechaIngreso;
  }

  public function getCategoria(): string {
    return $this->categoria;
  }

  public function setCategoria(string $categoria): void {
    $this->categoria = $categoria;
  }

  public function __toString(): string {
    $str =sprintf("<b>%s</b> \nNombre: %s %s \nDNI: %s \nFecha de Ingreso: %s\n",
      $this->categoria,
      $this->nombre,
      $this->apellidos, 
      $this->nif,
      $this->fechaIngreso->format('Y'),
    );

    return $str;
}

}

// $pablo= new Plantilla('44.828.871-C','Pablo', 'Travieso Méndez', 'Fijo', null);
// echo '<pre>';
// print_r($pablo);



