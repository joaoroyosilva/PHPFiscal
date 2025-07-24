<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemICMSSTException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CST/CSOSN não possui ICMS-ST. Verifique a propriedade 'PossuiIcmsST' antes de acionar o método de cálculo.");
    }
}
