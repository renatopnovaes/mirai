<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";
require_once("../../../Infra/Http/utils/request.php");

use Domain\Factory\MovimentoVasilhameFactory;

$repository = MovimentoVasilhameFactory::getRepository();



if ($_SERVER["REQUEST_METHOD"] === 'DELETE') {

    $data = getJsonBody();

    $id = $data->id;

    if (!$id) {
        die(json_encode(["error" => "Revise o Formulário!"]));
    }

    $repository->removeOneMovimentoVasilhame(intval($id));

    die(json_encode(["message" => "Movimentação removida com sucesso!"]));
}
