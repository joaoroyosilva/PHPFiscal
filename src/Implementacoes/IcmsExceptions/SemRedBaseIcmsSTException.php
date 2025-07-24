<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemRedBaseIcmsSTException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CST/CSOSN não possui redução de base de ICMS-ST. Verifique a propriedade 'PossuiRedBCIcmsST' antes de acionar o método de cálculo.");
    }
}
