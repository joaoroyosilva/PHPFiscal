<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemBasePropriaException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemICMSStException;
use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class Icms60 implements IIcms
{
    public function possuiIcmsProprio()
    {
        return false;
    }

    public function possuiIcmsSt()
    {
        return false;
    }

    public function possuiRedBCIcmsProprio()
    {
        return false;
    }

    public function possuiRedBCIcmsSt()
    {
        return false;
    }

    public function baseIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function valorIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function baseIcmsSt()
    {
        throw new Exception(new SemICMSStException());
    }

    public function valorIcmsSt()
    {
        throw new Exception(new SemICMSStException());
    }
}
