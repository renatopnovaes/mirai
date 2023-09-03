<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\ViagemFactory;

$repository = ViagemFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $data_saida = $_POST['data_saida'] ?? null;
    $observacao = $_POST['observacao'] ?? null;
    $rota = $_POST['rota'] ?? null;

    if (!$data_saida) {
        die(json_encode(["error" => "Você precisa a data de saída da viagem!"]));
    }


    $repository->addViagem($data_saida, $observacao, $rota);
    die(json_encode(["message" => "Viagem registrada com sucesso!"]));
}
