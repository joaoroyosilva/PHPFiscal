<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Sacfiscal\Phpfiscal\Interfaces\IIcms;

class Icms70 implements IIcms
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorIpi;
    private $valorDesconto;
    private $aliqIcmsProprio;
    private $aliqRedBcIcms;
    private $aliqIcmsSt;
    private $aliqRedBcIcmsSt;
    private $Mva;
    private $baseCalculo;
    private $baseCalculoReduzida;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $valorIpi,
        $valorDesconto,
        $aliqIcmsProprio,
        $aliqRedBcIcms,
        $aliqIcmsSt,
        $aliqRedBcIcmsSt,
        $mva
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorIpi = $valorIpi;
        $this->valorDesconto = $valorDesconto;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
        $this->aliqRedBcIcms = $aliqRedBcIcms;
        $this->aliqIcmsSt = $aliqIcmsSt;
        $this->aliqRedBcIcmsSt = $aliqRedBcIcmsSt;
        $this->Mva = $mva;
        $this->baseCalculo = new baseIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorIpi,
            $this->valorDesconto
        );
        $this->baseCalculoReduzida = new baseReduzidaIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorIpi,
            $this->valorDesconto,
            $this->aliqRedBcIcms
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
        return ($this->aliqRedBcIcms > 0);
    }

    public function possuiRedBCIcmsSt()
    {
        return ($this->aliqRedBcIcmsSt > 0);
    }

    public function baseIcms()
    {
        if ($this->PossuiRedBCIcmsProprio()) {
            return $this->baseCalculoReduzida->GerarBaseReduzidaIcms();
        } else {
            return $this->baseCalculo->GerarBaseIcms();
        }
    }

    public function valorIcms()
    {
        $valorIcms = new ValorIcms($this->baseIcms(), $this->aliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function baseIcmsSt()
    {
        if ($this->PossuiRedBCIcmsSt()) {
            $baseReduzidaIcmsSt = new baseReduzidaIcmsSt(
                $this->valorProduto,
                $this->valorFrete,
                $this->valorSeguro,
                $this->despesasAcessorias,
                $this->valorIpi,
                $this->valorDesconto,
                $this->aliqRedBcIcmsSt
            );
            return $baseReduzidaIcmsSt->GerarBaseReduzidaIcmsSt();
        } else {
            $baseIcmsSt = new baseIcmsSt($this->baseIcms(), $this->Mva);
            return $baseIcmsSt->GerarBaseIcmsSt();
        }
    }

    public function valorIcmsSt()
    {
        return (($this->baseIcmsSt() * ($this->aliqIcmsSt / 100)) - $this->valorIcms());
    }
}
