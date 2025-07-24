<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class ValorIcmsSt
{
    private $baseCalculoSt;
    private $aliqIcmsSt;
    private $valorIcms;

    public function __construct($baseCalculoSt, $aliqIcmsSt, $valorIcms)
    {
        $this->baseCalculoSt = $baseCalculoSt;
        $this->aliqIcmsSt = $aliqIcmsSt;
        $this->valorIcms = $valorIcms;
    }

    public function gerarValorIcmsSt(): float
    {
        return round(($this->baseCalculoSt * ($this->aliqIcmsSt / 100)) - $this->valorIcms, 2);
    }
}
