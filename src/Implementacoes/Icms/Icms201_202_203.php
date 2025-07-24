<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsStException;

class Icms201_202_203
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorIpi;
    private $valorDesconto;
    private $aliqIcmsProprio;
    private $aliqIcmsSt;
    private $Mva;
    private $baseCalculo;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $valorIpi,
        $valorDesconto,
        $aliqIcmsProprio,
        $aliqIcmsSt,
        $mva
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorIpi = $valorIpi;
        $this->valorDesconto = $valorDesconto;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
        $this->aliqIcmsSt = $aliqIcmsSt;
        $this->Mva = $mva;
        $this->baseCalculo = new baseIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorIpi,
            $this->valorDesconto
        );
    }

    public function possuiIcmsProprio()
    {
        return true;
    }

    public function possuiIcmsSt()
    {
        return true;
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
        return $this->baseCalculo->GerarBaseIcms();
    }

    public function valorIcms()
    {
        $valorIcms = new ValorIcms($this->baseIcms(), $this->aliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function baseIcmsSt()
    {
        $baseIcmsSt = new baseIcmsSt($this->baseIcms(), $this->Mva);
        return $baseIcmsSt->GerarBaseIcmsSt();
    }

    public function valorIcmsSt()
    {
        $valorIcmsSt = new ValorIcmsSt($this->baseIcmsSt(), $this->aliqIcmsSt, $this->valorIcms());
        return $valorIcmsSt->GerarValorIcmsSt();
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
