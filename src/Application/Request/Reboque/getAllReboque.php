<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\ReboqueFactory;

$repository = ReboqueFactory::getRepository();

$reboques = $repository->getAllReboques();

die(json_encode($reboques));
