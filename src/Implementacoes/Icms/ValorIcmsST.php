<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class ValorIcmsST
{
    private $baseCalculoST;
    private $aliqIcmsST;
    private $valorIcms;

    public function __construct($baseCalculoST, $aliqIcmsST, $valorIcms)
    {
        $this->baseCalculoST = $baseCalculoST;
        $this->aliqIcmsST = $aliqIcmsST;
        $this->valorIcms = $valorIcms;
    }

    public function gerarValorIcmsST(): float
    {
        return round(($this->baseCalculoST * ($this->aliqIcmsST / 100)) - $this->valorIcms, 2);
    }
}
