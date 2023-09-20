<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\VeiculoFactory;


$repository = VeiculoFactory::getRepository();

$veiculos = $repository->getVeiculosLivres();

die(json_encode($veiculos));
