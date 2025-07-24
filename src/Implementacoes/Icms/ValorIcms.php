<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class ValorIcms
{
    private $baseCalculo;
    private $aliqIcmsProprio;

    public function __construct(
        $baseCalculo,
        $aliqIcmsProprio
    ) {
        $this->baseCalculo = $baseCalculo;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
    }

    public function gerarValorIcms()
    {
        return round($this->aliqIcmsProprio / 100 * $this->baseCalculo, 2);
    }
}
