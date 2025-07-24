<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Pis;

use Sacfiscal\Phpfiscal\Interfaces\IPis;

class Pis03 implements IPis
{
    private $valorPisUnitario;
    private $QuantidadeTributavel;

    public function __construct(
        $valorPisUnitario,
        $quantidadeTributavel
    ) {
        $this->valorPisUnitario = $valorPisUnitario;
        $this->QuantidadeTributavel = $quantidadeTributavel;
    }

    public function baseCalculo()
    {
        return $this->QuantidadeTributavel;
    }

    public function valor()
    {
        return ($this->QuantidadeTributavel * $this->valorPisUnitario);
    }
}
