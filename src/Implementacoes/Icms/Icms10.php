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
        protected float $aliqIcmsST,
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

    public function baseIcmsST()
    {
        $baseIcmsST = new BaseIcmsST($this->baseCalculo(), $this->mva);
        return $baseIcmsST->gerarBaseIcmsST();
    }

    public function valorIcmsST()
    {
        $valorIcmsST = new ValorIcmsST($this->baseIcmsST(), $this->aliqIcmsST, $this->valor());
        return $valorIcmsST->gerarValorIcmsST();
    }

}
