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

    public function possuiIcmsST()
    {
        return $this->Icms->PossuiIcmsST;
    }

    public function possuiRedBCIcmsProprio()
    {
        return $this->Icms->PossuiRedBCIcmsProprio;
    }

    public function possuiRedBCIcmsST()
    {
        return $this->Icms->PossuiRedBCIcmsST;
    }

    public function baseIcms()
    {
        return $this->Icms->baseIcms();
    }

    public function baseIcmsST()
    {
        return $this->Icms->baseIcmsST();
    }

    public function valorIcms()
    {
        return $this->Icms->valorIcms();
    }

    public function valorIcmsST()
    {
        return $this->Icms->valorIcmsST();
    }
}
