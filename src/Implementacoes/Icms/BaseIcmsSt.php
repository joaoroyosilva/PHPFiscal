<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class BaseIcmsSt
{
    public function __construct(
        protected float $baseIcms,
        protected float $mva,
        protected float $percentualReducaoSt = 0
    ) {
    }

    public function gerarBaseIcmsSt()
    {
        $base = round(($this->baseIcms) * (1 + ($this->mva / 100)), 2);

        if ($this->percentualReducaoSt > 0) {
            $base = round($base - ($base * ($this->percentualReducaoSt / 100)), 2);
        }

        return $base;
    }
}
