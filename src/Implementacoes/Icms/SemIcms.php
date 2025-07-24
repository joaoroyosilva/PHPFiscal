<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemBasePropriaException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemICMSStException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsStException;
use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class SemIcms implements IIcms
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

    public function baseIcmsSt()
    {
        throw new Exception(new SemICMSStException());
    }

    public function percRedBaseIcms()
    {
        throw new Exception(new SemRedBaseIcmsException());
    }

    public function percRedBaseIcmsSt()
    {
        throw new Exception(new SemRedBaseIcmsStException());
    }

    public function valorIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function valorIcmsSt()
    {
        throw new Exception(new SemICMSStException());
    }

    public function valorRedBaseIcms()
    {
        throw new Exception(new SemRedBaseIcmsException());
    }

    public function valorRedBaseIcmsSt()
    {
        throw new Exception(new SemRedBaseIcmsStException());
    }
}
