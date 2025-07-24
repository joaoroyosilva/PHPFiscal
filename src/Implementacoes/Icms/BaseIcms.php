<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class BaseIcms
{
    public function __construct(
        protected float $valorProduto,
        protected float $valorFrete,
        protected float $valorSeguro,
        protected float $despesasAcessorias,
        protected float $valorDesconto,
        protected float $valorIpi,
        protected bool $icmsSobreIpi = false
    ) {
    }

    public function gerarBaseIcms(): float
    {
        $baseIcms = (
            $this->valorProduto +
            $this->valorFrete +
            $this->valorSeguro +
            $this->despesasAcessorias -
            $this->valorDesconto
        );

        if ($this->icmsSobreIpi) {
            $baseIcms += $this->valorIpi;
        }

        return round($baseIcms, 2);
    }
}
