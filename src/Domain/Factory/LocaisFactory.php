<?php

namespace Domain\Factory;

use Domain\Repository\LocaisRepository;
use Domain\Entity\LocaisEntity;

abstract class LocaisFactory extends AbstractFactory
{
    public static function getRepository(): LocaisRepository
    {
        return new LocaisRepository();
    }

    public static function getEntity(array|null $data): LocaisEntity
    {
        return new LocaisEntity(
            local_id: $data['local_id'] ?? null,
            local_nome: $data['local_nome'] ?? null
        );
    }
}
