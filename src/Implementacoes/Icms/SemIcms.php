<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemBasePropriaException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemICMSSTException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsSTException;
use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class SemIcms implements IIcms
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

    public function baseIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function baseIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function percRedBaseIcms()
    {
        throw new Exception(new SemRedBaseIcmsException());
    }

    public function percRedBaseIcmsST()
    {
        throw new Exception(new SemRedBaseIcmsSTException());
    }

    public function valorIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function valorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function valorRedBaseIcms()
    {
        throw new Exception(new SemRedBaseIcmsException());
    }

    public function valorRedBaseIcmsST()
    {
        throw new Exception(new SemRedBaseIcmsSTException());
    }
}
