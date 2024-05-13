<?php

namespace Herencia;

require_once __DIR__ . '/Animal.php';
require_once __DIR__ . '/Cuadrupedo.php';
require_once __DIR__ . '/RespiradorOxigeno.php';

class Gato extends Animal implements Cuadrupedo, RespiradorOxigeno
{
  public function correr($destino)
  {
  }

  public function respirar()
  {
  }
}
