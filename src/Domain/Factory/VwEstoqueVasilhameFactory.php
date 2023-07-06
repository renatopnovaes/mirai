<?php

namespace Domain\Factory;

use Domain\Repository\VwEstoqueVasilhameRepository;
use Domain\Entity\VwEstoqueVasilhameEntity;

abstract class VwEstoqueVasilhameFactory extends AbstractFactory
{
    public static function getRepository(): VwEstoqueVasilhameRepository
    {
        return new VwEstoqueVasilhameRepository();
    }

    public static function getEntity(array|null $data): VwEstoqueVasilhameEntity
    {
        return new VwEstoqueVasilhameEntity(
            local: $data['local'] ?? null,
            produto: $data['produto'] ?? null,
            total: $data['total'] ?? null

        );
    }
}
