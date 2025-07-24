<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemICMSStException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CSt/CSOSN não possui ICMS-St. Verifique a propriedade 'PossuiIcmsSt' antes de acionar o método de cálculo.");
    }
}
