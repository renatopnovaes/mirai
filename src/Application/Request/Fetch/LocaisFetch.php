<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";



use Domain\Factory\LocaisFactory;

$locais = LocaisFactory::getListLocais();

die(json_encode($locais));