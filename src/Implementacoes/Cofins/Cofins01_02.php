<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Cofins;

use Sacfiscal\Phpfiscal\Interfaces\Tributo;

class Cofins01_02 implements Tributo
{
    public function __construct(
        private float $aliqCofins,
        private float $valorProduto,
        private float $despesasAcessorias,
        private float $valorFrete,
        private float $valorDesconto,
        private float $valorSeguro
    ) {
    }

    public function baseCalculo()
    {
        $base = (
            $this->valorProduto +
            $this->valorFrete +
            $this->valorSeguro +
            $this->despesasAcessorias -
            $this->valorDesconto
        );

        return round($base, 2);
    }

    public function valor()
    {
        return round(($this->baseCalculo() * ($this->aliqCofins / 100)), 2);
    }
}
