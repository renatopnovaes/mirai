<?php

namespace Domain\Factory;

use Domain\Entity\AbastecimentoEntity;
use Domain\Repository\AbastecimentoRepository;

class AbastecimentoFactory extends AbstractFactory
{
    static function getRepository(): AbastecimentoRepository
    {
        return new AbastecimentoRepository();
    }

    static function getEntity(array|null $data): AbastecimentoEntity
    {
        return new AbastecimentoEntity(
            $data['posto'],
            $data['litros'],
            $data['valor_litro'],
            $data['valor'],
            $data['data'],
            $data['observacao'],
            $data['km']
        );
    }
}