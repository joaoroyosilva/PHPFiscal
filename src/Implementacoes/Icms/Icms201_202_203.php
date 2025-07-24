<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsException;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemRedBaseIcmsSTException;

class Icms201_202_203
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorIpi;
    private $valorDesconto;
    private $aliqIcmsProprio;
    private $aliqIcmsST;
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
        $aliqIcmsST,
        $mva
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorIpi = $valorIpi;
        $this->valorDesconto = $valorDesconto;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
        $this->aliqIcmsST = $aliqIcmsST;
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

    public function possuiIcmsST()
    {
        return true;
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
        return $this->baseCalculo->GerarBaseIcms();
    }

    public function valorIcms()
    {
        $valorIcms = new ValorIcms($this->baseIcms(), $this->aliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function baseIcmsST()
    {
        $baseIcmsST = new baseIcmsST($this->baseIcms(), $this->Mva);
        return $baseIcmsST->GerarBaseIcmsST();
    }

    public function valorIcmsST()
    {
        $valorIcmsST = new ValorIcmsST($this->baseIcmsST(), $this->aliqIcmsST, $this->valorIcms());
        return $valorIcmsST->GerarValorIcmsST();
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
