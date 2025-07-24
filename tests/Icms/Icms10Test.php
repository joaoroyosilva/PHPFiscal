<?php

use Sacfiscal\Phpfiscal\Implementacoes\Icms\Icms10;

test("testa cálculo icms st", function () {
    $valorProduto = 135.0;
    $valorFrete = 7.5;
    $valorSeguro = 3;
    $despesasAcessorias = 1.5;
    $valorDesconto = 13.5;
    $aliquota = 18;
    $mva = 35;
    $aliquotaSt = 18;

    /** @var Icms10 */
    $icms = new Icms10(
        valorProduto: $valorProduto,
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro,
        mva: $mva,
        aliqIcmsST: $aliquotaSt
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    $bcSt = $icms->baseIcmsST();
    $valorSt = $icms->valorIcmsST();

    expect($bc)->toBe(133.5);
    expect($valor)->toBe(24.03);

    expect($bcSt)->toBe(180.23);
    expect($valorSt)->toBe(8.41);
});
