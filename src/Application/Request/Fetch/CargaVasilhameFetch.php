<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\CargaVasilhameFactory;

$repository = CargaVasilhameFactory::getRepository();
$CargaVasilhame = $repository->getAllCargaVasilhame();

die(json_encode($CargaVasilhame));