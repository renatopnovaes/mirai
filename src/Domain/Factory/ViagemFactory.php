<?php

namespace Domain\Factory;

use Domain\Entity\ViagemEntity;
use Domain\Repository\ViagemRepository;

abstract class ViagemFactory extends AbstractFactory
{
    public static function getRepository()
    {
        return new ViagemRepository();
    }

    public static function getEntity(array|null $data): ViagemEntity
    {
        return new ViagemEntity(
            data_saida: $data['data_saida'] ?? null,
            data_chegada: $data['data_chegada'] ?? null,
            flag_viagem: $data['flag_viagem'] ?? null,
        );
    }
}
