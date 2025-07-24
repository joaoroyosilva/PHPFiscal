<?php

use Sacfiscal\Phpfiscal\Implementacoes\Icms\Icms20;

test("testa cálculo icms com base reduzida", function () {
    $valorProduto = 135.0;
    $valorFrete = 7.5;
    $valorSeguro = 3;
    $despesasAcessorias = 1.5;
    $valorDesconto = 13.5;
    $aliquota = 18;
    $percentualReducao = 10;

    /** @var Icms20 */
    $icms = new Icms20(
        valorProduto: $valorProduto,
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro,
        percentualReducao: $percentualReducao
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    expect($bc)->toBe(120.15);
    expect($valor)->toBe(21.63);
});

test("testa cálculo icms com base reduzida com ipi na base", function () {
    $valorProduto = 135.0;
    $valorFrete = 7.5;
    $valorSeguro = 3;
    $despesasAcessorias = 1.5;
    $valorDesconto = 13.5;
    $aliquota = 18;
    $percentualReducao = 10;
    $valorIpi = 15;

    /** @var Icms20 */
    $icms = new Icms20(
        valorProduto: $valorProduto,
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro,
        valorIpi: $valorIpi,
        percentualReducao: $percentualReducao,
        icmsSobreIpi: true
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    expect($bc)->toBe(135.15);
    expect($valor)->toBe(24.33);
});
