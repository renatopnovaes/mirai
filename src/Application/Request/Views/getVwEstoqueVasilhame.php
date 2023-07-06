<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\VwEstoqueVasilhameFactory;

$repository = VwEstoqueVasilhameFactory::getRepository();
$estoquevasilhame = $repository->getAllVwEstoqueVasilhame();

die(json_encode($estoquevasilhame));
