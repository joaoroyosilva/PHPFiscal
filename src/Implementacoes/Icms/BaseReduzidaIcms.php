<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class BaseReduzidaIcms extends BaseIcms
{
    public function __construct(
        protected float $valorProduto,
        protected float $valorFrete,
        protected float $valorSeguro,
        protected float $despesasAcessorias,
        protected float $valorDesconto,
        protected float $valorIpi,
        protected float $percentualReducao,
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

        $baseIcms = ($baseIcms - ($baseIcms * ($this->percentualReducao / 100)));

        if ($this->icmsSobreIpi) {
            $baseIcms += $this->valorIpi;
        }

        return round($baseIcms, 2);
    }
}
