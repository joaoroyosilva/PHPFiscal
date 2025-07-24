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
    private $aliqIcmsST;
    private $aliqRedBcIcmsST;
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
        $aliqIcmsST,
        $aliqRedBcIcmsST,
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
        $this->aliqIcmsST = $aliqIcmsST;
        $this->aliqRedBcIcmsST = $aliqRedBcIcmsST;
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

    public function possuiIcmsST()
    {
        return true;
    }

    public function possuiRedBCIcmsProprio()
    {
        return ($this->aliqRedBcIcms > 0);
    }

    public function possuiRedBCIcmsST()
    {
        return ($this->aliqRedBcIcmsST > 0);
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

    public function baseIcmsST()
    {
        if ($this->PossuiRedBCIcmsST()) {
            $baseReduzidaIcmsST = new baseReduzidaIcmsST(
                $this->valorProduto,
                $this->valorFrete,
                $this->valorSeguro,
                $this->despesasAcessorias,
                $this->valorIpi,
                $this->valorDesconto,
                $this->aliqRedBcIcmsST
            );
            return $baseReduzidaIcmsST->GerarBaseReduzidaIcmsST();
        } else {
            $baseIcmsST = new baseIcmsST($this->baseIcms(), $this->Mva);
            return $baseIcmsST->GerarBaseIcmsST();
        }
    }

    public function valorIcmsST()
    {
        return (($this->baseIcmsST() * ($this->aliqIcmsST / 100)) - $this->valorIcms());
    }
}
