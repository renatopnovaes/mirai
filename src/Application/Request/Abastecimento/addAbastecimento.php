<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\AbastecimentoFactory;

$repository = AbastecimentoFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {



    $viagem_id = $_POST['viagem_id'] ?? null;
    $posto = $_POST['posto'] ?? null;
    $litros = $_POST['litros'] ?? null;
    $valor_litro = $_POST['litro_valor'] ?? null;
    $valor = $_POST['valor'] ?? null;
    $data = $_POST['data_abastecimento'] ?? null;
    $observacao = $_POST['observacao'] ?? null;
    $km = $_POST['km'] ?? null;


    if (!$viagem_id || !$posto || !$litros || !$valor_litro || !$valor || !$data || !$observacao || !$km) {
        die(json_encode(["error" => "Você precisa preencher todos os campos!"]));
    }

    $repository->addAbastecimento($viagem_id, $posto, $litros, $valor_litro, $valor, $data, $observacao, $km);
    die(json_encode(["message" => "Abastecimento registrado com sucesso!"]));
}
