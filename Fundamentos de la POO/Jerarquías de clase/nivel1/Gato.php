<?php

namespace JerarquiaClases\Nivel1;

require_once __DIR__ . '/Animal.php';

class Gato extends Animal
{
  private bool $esAsqueroso;

  public function maullar()
  {
  }
}
