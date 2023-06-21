<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\CargaVasilhameFactory;

$repository = CargaVasilhameFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $numeroCarga = $_POST['numero_carga'] ?? null;
    $dataCarga = $_POST['data_carga'] ?? null;

    if (!$numeroCarga || !$dataCarga) {
        die(json_encode(["error" => "Você precisa inserir o numero e a data da carga!"]));
    }

    $checkCarga = $repository->getOneCargaVasilhame($numeroCarga);
    if ($checkCarga) {
        die(json_encode(["error" => "Numero de carga ja cadastrada!"]));
    }
    
    $repository->addCargaVasilhame($numeroCarga, $dataCarga);
    die(json_encode(["message" => "Carga cadastrada com sucesso!"]));
}