<?php
namespace Domain\Factory;

use Domain\Entity\ProdutoEntity;
use Domain\Repository\ProdutoRepository;

abstract class ProdutoFactory extends AbstractFactory
{
    public static function getRepository()
    {
        return new ProdutoRepository();
    }

    public static function getEntity(array|null $data): ProdutoEntity
    {
        return new ProdutoEntity(
            produto_id: $data['produto_id'] ?? null,
            produto_nome: $data['produto_nome'] ?? null,
            produto_quantidade: $data['produto_quantidade'] ?? null,
        );
    }
}