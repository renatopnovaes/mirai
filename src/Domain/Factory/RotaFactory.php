<?php

namespace Domain\Factory;

use Domain\Entity\RotaEntity;
use Domain\Repository\RotaRepository;

abstract class RotaFactory extends AbstractFactory
{

    public static function getRepository()
    {
        return new RotaRepository();
    }

    public static function getEntity(array|null $data): RotaEntity
    {
        return new RotaEntity(
            id: $data['id'] ?? null,
            origem: $data['origem'] ?? null,
            destino: $data['destino'] ?? null,
            distancia_km: $data['distancia_km'] ?? null,
            descricao: $data['descricao'] ?? null,
            observacao: $data['observacao'] ?? null,
            duracao_minutos: $data['duracao_minutos'] ?? null,
        );
    }
}
