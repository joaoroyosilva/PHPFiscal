<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class Icms20 extends IcmsBase
{
    public function __construct(
        protected float $valorProduto,
        protected float $aliqIcmsProprio,
        protected float $valorFrete = 0,
        protected float $valorSeguro = 0,
        protected float $despesasAcessorias = 0,
        protected float $valorIpi = 0,
        protected float $valorDesconto = 0,
        protected float $percentualReducao = 0,
        protected bool $icmsSobreIpi = false
    ) {
        $this->baseCalculo = new BaseReduzidaIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorDesconto,
            $this->valorIpi,
            $this->percentualReducao,
            $this->icmsSobreIpi
        );
    }
}
