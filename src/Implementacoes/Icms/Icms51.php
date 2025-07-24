<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Exception;
use Sacfiscal\Phpfiscal\Implementacoes\IcmsExceptions\SemICMSSTException;
use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class Icms51 implements IIcms
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorIpi;
    private $valorDesconto;
    private $aliqIcmsProprio;
    private $aliqDifIcms;
    private $baseCalculo;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $valorIpi,
        $valorDesconto,
        $aliqIcmsProprio,
        $aliqDifIcms
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorIpi = $valorIpi;
        $this->valorDesconto = $valorDesconto;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
        $this->aliqDifIcms = $aliqDifIcms;
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
        return false;
    }

    public function possuiRedBCIcmsProprio()
    {
        return true;
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

    public function valorIcmsDiferido()
    {
        return ($this->valorIcms() - (($this->valorIcms() * ($this->aliqDifIcms / 100))));
    }

    public function baseIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function valorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }
}
