<?php
function calcular_gastos_administrativos($monto) {
    $tipo_cambio = 3.74; 

    if ($monto <= 2500) {
        return 2000 * $tipo_cambio;
    } elseif ($monto <= 5000) {
        return 2500 * $tipo_cambio;
    } elseif ($monto <= 10000) {
        return 3130 * $tipo_cambio;
    } elseif ($monto <= 20000) {
        return 3800 * $tipo_cambio;
    } elseif ($monto <= 30000) {
        return 4750 * $tipo_cambio;
    } elseif ($monto <= 50000) {
        return 5875 * $tipo_cambio;
    } elseif ($monto <= 60000) {
        return 6625 * $tipo_cambio;
    } elseif ($monto <= 100000) {
        return 7625 * $tipo_cambio;
    } elseif ($monto <= 500000) {
        return 8375 * $tipo_cambio;
    } elseif ($monto <= 1000000) {
        return 11250 * $tipo_cambio;
    } elseif ($monto <= 5000000) {
        return 14062.50 * $tipo_cambio;
    } else {
        return 17625 * $tipo_cambio;
    }
}

function calcular_arbitro_unico($monto) {
    $tipo_cambio = 3.74;

    $honorarios_arbitro_unico = 0;

    if ($monto <= 2500) {
        $honorarios_arbitro_unico = 2000;
    } elseif ($monto <= 5000) {
        $honorarios_arbitro_unico = 2500;
    } elseif ($monto <= 10000) {
        $honorarios_arbitro_unico =  3130;
    } elseif ($monto <= 20000) {
        $honorarios_arbitro_unico = 3800;
    } elseif ($monto <= 30000) {
        $honorarios_arbitro_unico = 4750;
    } elseif ($monto <= 50000) {
        $honorarios_arbitro_unico = 5875;
    } elseif ($monto <= 60000) {
        $honorarios_arbitro_unico = 6625;
    } elseif ($monto <= 100000) {
        $honorarios_arbitro_unico = 7625;
    } elseif ($monto <= 500000) {
        $honorarios_arbitro_unico = 8375;
    } elseif ($monto <= 1000000) {
        $honorarios_arbitro_unico = 11250;
    } elseif ($monto <= 5000000) {
        $honorarios_arbitro_unico = 14062.50;
    } elseif ($monto <= 156250000) {
        $honorarios_arbitro_unico = 17625;
    }

    return $honorarios_arbitro_unico * $tipo_cambio;
}

function calcular_honorarios_tribunal($monto) {
    $tipo_cambio = 3.74;

    $honorarios_tribunal = 0;

    if ($monto <= 2500) {
        $honorarios_tribunal = 6000;
    } elseif ($monto <= 5000) {
        $honorarios_tribunal = 7500;
    } elseif ($monto <= 10000) {
        $honorarios_tribunal = 9000;
    } elseif ($monto <= 20000) {
        $honorarios_tribunal = 10500;
    } elseif ($monto <= 30000) {
        $honorarios_tribunal = 13000;
    } elseif ($monto <= 50000) {
        $honorarios_tribunal = 15750;
    } elseif ($monto <= 60000) {
        $honorarios_tribunal = 18000;
    } elseif ($monto <= 100000) {
        $honorarios_tribunal = 21000;
    } elseif ($monto <= 500000) {
        $honorarios_tribunal = 26250;
    } elseif ($monto <= 1000000) {
        $honorarios_tribunal = 31500;
    } elseif ($monto <= 5000000) {
        $honorarios_tribunal = 36750;
    } elseif ($monto <= 171833334) {
        $honorarios_tribunal = 42000;
    }

    return $honorarios_tribunal * $tipo_cambio;
}

?>