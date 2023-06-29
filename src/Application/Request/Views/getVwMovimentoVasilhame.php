<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\VwMovimentoVasilhameFactory;

$repository = VwMovimentoVasilhameFactory::getRepository();
$movimentovasilhame = $repository->getAllVwMovimentoVasilhame();

die(json_encode($movimentovasilhame));
