<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\RotaFactory;

$repository = RotaFactory::getRepository();

$rotas = $repository->getRotas();

die(json_encode($rotas));
