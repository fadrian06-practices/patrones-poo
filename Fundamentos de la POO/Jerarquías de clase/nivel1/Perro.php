<?php

namespace JerarquiaClases\Nivel1;

require_once __DIR__ . '/Animal.php';
require_once __DIR__ . '/Humano.php';

class Perro extends Animal
{
  private Humano $mejorAmigo;

  public function ladrar()
  {
  }
}
