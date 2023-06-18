<?php
namespace Domain\Factory;

use Domain\Repository\ProdutoRepository;

abstract class ProdutoFactory
{
    private static function getRepository()
    {
        return new ProdutoRepository();
    }

    public static function getListProdutos(): array|string
    {
        return self::getRepository()->getAllProdutos();
    }
}