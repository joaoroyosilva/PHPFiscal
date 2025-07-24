<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemBasePropriaException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemICMSSTException;
use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class Icms101_102_103 implements IIcms
{
    public function possuiIcmsProprio()
    {
        return false;
    }

    public function possuiIcmsST()
    {
        return false;
    }

    public function possuiRedBCIcmsProprio()
    {
        return false;
    }

    public function possuiRedBCIcmsST()
    {
        return false;
    }

    public function __construct()
    {
    }

    public function baseIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function valorIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function baseIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function valorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }
}
