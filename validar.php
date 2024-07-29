<?php

function validaCPF($cpf) {

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

function validarCNPJ($cnpj) {
    // Remove caracteres não numéricos
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    // Verifica se o CNPJ tem 14 dígitos
    if (strlen($cnpj) != 14) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Calcula os dígitos verificadores para verificar se o CNPJ é válido
    $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i]);
    if ($cnpj[12] != (($n %= 11) < 2 ? 0 : 11 - $n)) {
        return false;
    }

    for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i++]);
    if ($cnpj[13] != (($n %= 11) < 2 ? 0 : 11 - $n)) {
        return false;
    }

    return true;
}
?>