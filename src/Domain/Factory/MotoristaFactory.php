<?php

namespace Domain\Factory;

use Domain\Repository\MotoristaRepository;
use Domain\Entity\MotoristaEntity;

abstract class MotoristaFactory extends AbstractFactory
{
    public static function getRepository(): MotoristaRepository
    {
        return new MotoristaRepository();
    }

    public static function getEntity(array|null $data): MotoristaEntity
    {
        return new MotoristaEntity(
            motorista_id: $data['motorista_id'] ?? null,
            motorista_nome: $data['motorista_nome'] ?? null
        );
    }
}