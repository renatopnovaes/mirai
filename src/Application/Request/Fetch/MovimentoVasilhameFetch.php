<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\MovimentoVasilhameFactory;

$repository = MovimentoVasilhameFactory::getRepository();
$MovimentoVasilhame = $repository->getAllMovimentoVasilhame();

die(json_encode($MovimentoVasilhame));