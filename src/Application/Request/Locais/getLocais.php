<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\LocaisFactory;

$repository = LocaisFactory::getRepository();
$locais = $repository->getAllLocais();

die(json_encode($locais));
