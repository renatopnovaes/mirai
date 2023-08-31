<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\ViagemFactory;

$repository = ViagemFactory::getRepository();

$viagens_ativas = $repository->getViagemAberta();

die(json_encode($viagens_ativas));
