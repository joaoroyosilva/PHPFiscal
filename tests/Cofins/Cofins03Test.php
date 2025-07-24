<?php

use Sacfiscal\Phpfiscal\Implementacoes\Cofins\Cofins03;

test("testa cofins 03", function () {
    $quantidade = 15;
    $aliquotaCOFINS = 0.764;

    /** @var Cofins03 */
    $cofins03 = new Cofins03($aliquotaCOFINS, $quantidade);

    $valor = $cofins03->valor();

    expect($valor)->toBe(11.46);
});
