<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use Domain\Factory\ProdutoFactory;

$repository = ProdutoFactory::getRepository();
$produtos = $repository->getAllProdutos();

die(json_encode($produtos));