<?php

use Sacfiscal\Phpfiscal\Implementacoes\Cofins\Cofins01_02;

test("testa cofins 01 e 02", function () {
    $valorProduto = 180.0;
    $valorFrete = 4.96;
    $valorSeguro = 0.50;
    $despesasAcessorias = 1.49;
    $aliquotaCOFINS = 3.00;
    $valorDesconto = 3.00;

    /** @var Cofins01_02 */
    $cofins01_02 = new Cofins01_02(
        aliqCofins: $aliquotaCOFINS,
        despesasAcessorias: $despesasAcessorias,
        valorFrete: $valorFrete,
        valorProduto: $valorProduto,
        valorDesconto: $valorDesconto,
        valorSeguro: $valorSeguro
    );

    $bc = $cofins01_02->baseCalculo();
    $valor = $cofins01_02->valor();

    expect($bc)->toBe(183.95);
    expect($valor)->toBe(5.52);
});
