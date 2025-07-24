<?php

namespace Sacfiscal\Phpfiscal\Implementacoes\Icms;

use Sacfiscal\Phpfiscal\Interfaces\Tributo;

abstract class IcmsBase implements Tributo
{
    /**
     * @var BaseIcms
     */
    protected BaseIcms $baseCalculo;

    /**
     *  @var bool
     */
    protected bool $possuiIcmsProprio = true;

    /**
     *  @var bool
     */
    protected bool $possuiIcmsST = false;

    /**
     *  @var bool
     */
    protected bool $possuiRedBCIcmsProprio = false;

    /**
     *  @var bool
     */
    protected bool $possuiRedBCIcmsST = false;

    public function __construct(
        protected float $valorProduto,
        protected float $aliqIcmsProprio,
        protected float $valorFrete = 0,
        protected float $valorSeguro = 0,
        protected float $despesasAcessorias = 0,
        protected float $valorIpi = 0,
        protected float $valorDesconto = 0,
        protected bool $icmsSobreIpi = false
    ) {
        $this->baseCalculo = new BaseIcms(
            $this->valorProduto,
            $this->valorFrete,
            $this->valorSeguro,
            $this->despesasAcessorias,
            $this->valorDesconto,
            $this->valorIpi,
            $this->icmsSobreIpi
        );
    }

    public function baseCalculo(): float
    {
        return $this->baseCalculo->gerarBaseIcms();
    }

    public function valor()
    {
        $valorIcms = new ValorIcms($this->baseCalculo(), $this->aliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }
}
