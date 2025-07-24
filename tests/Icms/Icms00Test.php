<?php

use Sacfiscal\Phpfiscal\Implementacoes\Icms\Icms00;

test("testa cálculo icms próprio", function () {
    $valorProduto = 180.0;
    $valorFrete = 4.96;
    $valorSeguro = 0.50;
    $despesasAcessorias = 1.49;
    $aliquota = 3.00;
    $valorDesconto = 3.00;

    /** @var Icms00 */
    $icms = new Icms00(
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorProduto: $valorProduto,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    expect($bc)->toBe(183.95);
    expect($valor)->toBe(5.52);
});


test("testa cálculo icms próprio com ipi na base", function () {
    $valorProduto = 135.0;
    $valorFrete = 7.5;
    $valorSeguro = 3;
    $despesasAcessorias = 1.5;
    $aliquota = 18;
    $valorDesconto = 13.5;
    $valorIpi = 15;

    /** @var Icms00 */
    $icms = new Icms00(
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorProduto: $valorProduto,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro,
        valorIpi: $valorIpi,
        icmsSobreIpi: true
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    expect($bc)->toBe(148.5);
    expect($valor)->toBe(26.73);
});
