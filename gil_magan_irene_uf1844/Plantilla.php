<?php

abstract class Plantilla
{
  protected string $nombre;
  protected ?string $apellidos;
  protected string $id;
  protected int $fechaIngreso;


  function __construct(string $nombre, ?string $apellidos, string $id, int $fechaIngreso)
  {
    $this->nombre = $nombre;
    $this->apellidos = $apellidos ?? '';
    $this->id = $id;
    $this->fechaIngreso = $fechaIngreso;
  }

  function getNombre(): string
  {
    return $this->nombre;
  }

  function getApellidos()
  {
    return $this->apellidos ?? '';
  }

  function getId(): string
  {
    return $this->id;
  }

  function getFechaIngreso(): int
  {
    return $this->fechaIngreso;
  }

  function setFechaIngreso($fechaIngreso)
  {
    $this->fechaIngreso = $fechaIngreso;
  }
}
