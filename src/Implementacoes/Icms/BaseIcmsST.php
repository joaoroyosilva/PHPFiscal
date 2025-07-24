<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class BaseIcmsST
{
    public function __construct(
        protected float $baseIcms,
        protected float $mva
    ) {
    }

    public function gerarBaseIcmsST()
    {
        return round(($this->baseIcms) * (1 + ($this->mva / 100)), 2);
    }
}
