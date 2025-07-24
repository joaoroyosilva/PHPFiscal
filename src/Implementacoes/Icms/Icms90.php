<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class Icms90 implements IIcms
{
    private $Icms;

    public function __construct($icms)
    {
        $this->Icms = $icms;
    }

    public function possuiIcmsProprio()
    {
        return $this->Icms->PossuiIcmsProprio;
    }

    public function possuiIcmsSt()
    {
        return $this->Icms->PossuiIcmsSt;
    }

    public function possuiRedBCIcmsProprio()
    {
        return $this->Icms->PossuiRedBCIcmsProprio;
    }

    public function possuiRedBCIcmsSt()
    {
        return $this->Icms->PossuiRedBCIcmsSt;
    }

    public function baseIcms()
    {
        return $this->Icms->baseIcms();
    }

    public function baseIcmsSt()
    {
        return $this->Icms->baseIcmsSt();
    }

    public function valorIcms()
    {
        return $this->Icms->valorIcms();
    }

    public function valorIcmsSt()
    {
        return $this->Icms->valorIcmsSt();
    }
}
