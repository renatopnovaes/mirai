<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\MotoristaFactory;

$repository = MotoristaFactory::getRepository();

$motoristas = $repository->getAllMotoristas();

die(json_encode($motoristas));
