<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";



use Domain\Factory\ProdutoFactory;

$produtos = ProdutoFactory::getListProdutos();

die(json_encode($produtos));