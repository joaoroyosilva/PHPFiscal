<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemRedBaseIcmsException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CST/CSOSN não possui redução de base de ICMS. Verifique a propriedade 'PossuiRedBCIcms' antes de acionar o método de cálculo.");
    }
}
