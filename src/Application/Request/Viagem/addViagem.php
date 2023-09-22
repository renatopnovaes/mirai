<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\ViagemFactory;

$repository = ViagemFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $data_saida = $_POST['data_saida'] ?? null;
    $observacao = $_POST['observacao'] ?? null;
    $rota = $_POST['rota'] ?? null;
    $veiculo = $_POST['viagem_veiculo'] ?? null;
    $reboque = $_POST['viagem_reboque'] ?? null;
    $km_saida = $_POST['viagem_km_saida'] ?? null;
    $km_chegada = $_POST['viagem_km_chegada'] ?? null;
    $data_chegada = $_POST['viagem_data_chegada'] ?? null;
    $motorista = $_POST['viagem_motorista'] ?? null;


    if (!$data_saida) {
        die(json_encode(["error" => "Você precisa a data de saída da viagem!"]));
    }


    $repository->addViagem($data_saida, $observacao, $rota, $veiculo, $reboque, $km_saida, $km_chegada, $data_chegada, $motorista);
    die(json_encode(["message" => "Viagem registrada com sucesso!"]));
}
