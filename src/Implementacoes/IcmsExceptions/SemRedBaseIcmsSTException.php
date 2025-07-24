<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemRedBaseIcmsStException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CSt/CSOSN não possui redução de base de ICMS-St. Verifique a propriedade 'PossuiRedBCIcmsSt' antes de acionar o método de cálculo.");
    }
}
