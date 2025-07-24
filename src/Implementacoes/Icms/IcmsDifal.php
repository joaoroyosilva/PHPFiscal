<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

class IcmsDifal
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorIpi;
    private $valorDesconto;
    private $aliqIcmsProprio;
    private $aliqIcmsInternoDestino;
    private $Fcp;
    private $Partilha;
    private $baseCalculo;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $valorIpi,
        $valorDesconto,
        $aliqIcmsProprio,
        $aliqIcmsInternoDestino,
        $fcp
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorIpi = $valorIpi;
        $this->valorDesconto = $valorDesconto;
        $this->aliqIcmsProprio = $aliqIcmsProprio;
        $this->aliqIcmsInternoDestino = $aliqIcmsInternoDestino;
        $this->Fcp = $fcp;
        $this->baseCalculo = new baseIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorIpi,
            $this->valorDesconto
        );

        $this->Partilha = 0;

        switch (date("Y")) {
            case 2016:
                $this->Partilha = 40;
                break;
            case 2017:
                $this->Partilha = 60;
                break;
            case 2018:
                $this->Partilha = 80;
                break;
            default:
                $this->Partilha = 100;
                break;
        }
    }

    public function baseIcms()
    {
        return $this->baseCalculo->GerarBaseIcms();
    }

    public function valorFcpDestino()
    {
        $bcIcms = $this->baseIcms();
        return ($this->Fcp / 100 * $bcIcms);
    }

    public function valorDifal()
    {
        return $this->baseIcms() * (($this->aliqIcmsInternoDestino - $this->aliqIcmsProprio) / 100);
    }

    public function valorIcmsDestino()
    {
        return ($this->valorDifal() * ($this->Partilha / 100));
    }

    public function valorIcmsRemetente()
    {
        $difal = $this->baseIcms() * (($this->aliqIcmsInternoDestino - $this->aliqIcmsProprio) / 100);
        return ($difal * ((100 - $this->Partilha) / 100));
    }
}
