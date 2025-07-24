<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions;

use Exception;

class SemBasePropriaException extends Exception
{
    public function __construct()
    {
        parent::__construct("Este CSt/CSOSN não possui base própria de ICMS. Verifique a propriedade 'PossuiIcmsProprio' antes de acionar o método de cálculo.");
    }
}
