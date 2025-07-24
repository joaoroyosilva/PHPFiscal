<?php

use Sacfiscal\Phpfiscal\Implementacoes\Icms\Icms30;

test("testa cálculo icms cst 30", function () {
    $valorProduto = 135.0;
    $valorFrete = 7.5;
    $valorSeguro = 3;
    $despesasAcessorias = 1.5;
    $valorDesconto = 13.5;
    $aliquota = 18;
    $mva = 35;
    $aliquotaSt = 18;
    $percentualReducaoSt = 10;

    /** @var Icms30 */
    $icms = new Icms30(
        valorProduto: $valorProduto,
        aliqIcmsProprio: $aliquota,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro,
        mva: $mva,
        aliqIcmsSt: $aliquotaSt,
        percentualReducaoSt: $percentualReducaoSt
    );

    $bc = $icms->baseCalculo();
    $valor = $icms->valor();

    $bcSt = $icms->baseIcmsSt();
    $valorSt = $icms->valorIcmsSt();

    expect($bc)->toBe(133.5);
    expect($valor)->toBe(24.03);

    expect($bcSt)->toBe(162.21);
    expect($valorSt)->toBe(5.17);
});
