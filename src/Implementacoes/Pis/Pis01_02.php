<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Pis;

use Sacfiscal\Phpfiscal\Interfaces\IPis;

class Pis01_02 implements IPis
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $valorDesconto;
    private $aliqPis;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $valorDesconto,
        $aliqPis
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->valorDesconto = $valorDesconto;
        $this->aliqPis = $aliqPis;
    }

    public function baseCalculo()
    {
        $basePis = ($this->valorProduto +
            $this->valorFrete +
            $this->valorSeguro +
            $this->despesasAcessorias -
            $this->valorDesconto);
        return $basePis;
    }

    public function valor()
    {
        return ($this->baseCalculo() * ($this->aliqPis / 100));
    }
}
