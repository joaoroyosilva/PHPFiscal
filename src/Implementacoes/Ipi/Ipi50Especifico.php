<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Ipi;

use Sacfiscal\Phpfiscal\Interfaces\IIpi;

class Ipi50Especifico implements IIpi
{
    private $valorIpiUnitario;
    private $QuantidadeTributavel;

    public function __construct(
        $valorIpiUnitario,
        $quantidadeTributavel
    ) {
        $this->valorIpiUnitario = $valorIpiUnitario;
        $this->QuantidadeTributavel = $quantidadeTributavel;
    }

    public function baseCalculo()
    {
        return $this->QuantidadeTributavel;
    }

    public function valor()
    {
        return ($this->QuantidadeTributavel * $this->valorIpiUnitario);
    }
}
