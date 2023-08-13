<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\AjusteVasilhameFactory;

$repository = AjusteVasilhameFactory::getRepository();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $local = $_POST['local'] ?? null;
    $produto = $_POST['produto'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    if (!$local || !$produto || !$quantidade) {
        die(json_encode(["error" => "Você precisa inserir os dados do Ajuste!"]));
    }



    $repository->addAjusteVasilhame($local, $produto, $quantidade);
    die(json_encode(["message" => "Estoque ajustado com sucesso!"]));
}
