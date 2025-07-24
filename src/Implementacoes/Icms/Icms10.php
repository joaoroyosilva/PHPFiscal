<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class Icms10 extends IcmsBase
{
    public function __construct(
        protected float $valorProduto,
        protected float $valorFrete,
        protected float $valorSeguro,
        protected float $despesasAcessorias,
        protected float $valorDesconto,
        protected float $aliqIcmsProprio,
        protected float $aliqIcmsSt,
        protected float $mva,
        protected float $valorIpi = 0,
        protected bool $icmsSobreIpi = false
    ) {
        parent::__construct(
            valorProduto: $valorProduto,
            valorFrete: $valorFrete,
            valorSeguro:$valorSeguro,
            despesasAcessorias:$despesasAcessorias,
            valorIpi:$valorIpi,
            valorDesconto:$valorDesconto,
            aliqIcmsProprio:$aliqIcmsProprio
        );
    }

    public function baseIcmsSt()
    {
        $baseIcmsSt = new BaseIcmsSt($this->baseCalculo(), $this->mva);
        return $baseIcmsSt->gerarBaseIcmsSt();
    }

    public function valorIcmsSt()
    {
        $valorIcmsSt = new ValorIcmsSt($this->baseIcmsSt(), $this->aliqIcmsSt, $this->valor());
        return $valorIcmsSt->gerarValorIcmsSt();
    }
}
