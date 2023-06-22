<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\CargaVasilhameFactory;

$numero = $_GET['numero_carga'] ?? null;

$busca_numero = $_GET['carga_vasilhame'] ?? null;

$repository = CargaVasilhameFactory::getRepository();

if ($numero) {
    $cargaVasilhame = $repository->getOneCargaVasilhame($numero);
    die(json_encode($cargaVasilhame));
}

if ($busca_numero) {
    $cargaVasilhame = $repository->buscaCargaVasilhame($busca_numero);
    die(json_encode($cargaVasilhame));
}

$CargaVasilhame = $repository->getAllCargaVasilhame();
die(json_encode($CargaVasilhame));
