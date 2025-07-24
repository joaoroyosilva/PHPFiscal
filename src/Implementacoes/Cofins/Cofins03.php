<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Cofins;

use Sacfiscal\Phpfiscal\Interfaces\Tributo;

class Cofins03 implements Tributo
{
    public function __construct(
        protected float $valorCofinsUnitario,
        protected float $quantidadeTributavel
    ) {
    }

    public function baseCalculo()
    {
        return $this->quantidadeTributavel;
    }

    public function valor()
    {
        return round($this->quantidadeTributavel * $this->valorCofinsUnitario, 2);
    }
}
