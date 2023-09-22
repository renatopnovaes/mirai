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
            observacao: $data['observacao'] ?? null,
            rota_id: $data['rota_id'] ?? null,
            veiculo_id: $data['veiculo_id'] ?? null,
            reboque_id: $data['reboque_id'] ?? null,
            km_saida: $data['km_saida'] ?? null,
            km_chegada: $data['km_chegada'] ?? null,
            data_chegada: $data['data_chegada'] ?? null,
            motorista_id: $data['motorista_id'] ?? null,
            viagem_status: $data['viagem_status'] ?? null,
            viagem_concluida: $data['viagem_concluida'] ?? false
        );
    }
}
