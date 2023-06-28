<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\MovimentoVasilhameFactory;

$repository = MovimentoVasilhameFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $numeroCarga = $_POST['carga_vasilhame'] ?? null;
    $produto = $_POST['produto'] ?? null;
    $quantidade = $_POST['quantidade_total'] ?? null;
    $origem =  $_POST['origem'] ?? null;
    $destino =  $_POST['destino'] ?? null;
    $observacoes = $_POST['observacoes'] ?? null;


    if (!$numeroCarga || !$quantidade || !$origem || !$destino) {
        die(json_encode(["error" => "Revise o Formulário!"]));
    }


    $repository->addMovimentoVasilhame(intval($numeroCarga), intval($origem), intval($destino), $produto,  intval($quantidade), $observacoes);

    die(json_encode(["message" => "Carga cadastrada com sucesso!"]));
}
