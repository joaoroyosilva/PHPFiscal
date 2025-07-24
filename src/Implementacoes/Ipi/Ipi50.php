<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Ipi;

use Sacfiscal\Phpfiscal\Interfaces\IIpi;

class Ipi50 implements IIpi
{
    private $valorProduto;
    private $valorFrete;
    private $valorSeguro;
    private $despesasAcessorias;
    private $aliqIpi;

    public function __construct(
        $valorProduto,
        $valorFrete,
        $valorSeguro,
        $despesasAcessorias,
        $aliqIpi
    ) {
        $this->valorProduto = $valorProduto;
        $this->valorFrete = $valorFrete;
        $this->valorSeguro = $valorSeguro;
        $this->despesasAcessorias = $despesasAcessorias;
        $this->aliqIpi = $aliqIpi;
    }

    public function baseCalculo()
    {
        $baseIpi = ($this->valorProduto +
            $this->valorFrete +
            $this->valorSeguro +
            $this->despesasAcessorias);
        return $baseIpi;
    }

    public function valor()
    {
        return (($this->aliqIpi / 100) * $this->baseCalculo());
    }
}
