<?php

namespace Domain\Factory;

use Domain\Entity\ReboqueEntity;
use Domain\Repository\ReboqueRepository;

abstract class ReboqueFactory extends AbstractFactory
{
    public static function getRepository()
    {
        return new ReboqueRepository();
    }

    public static function getEntity(array|null $data)
    {
        return new ReboqueEntity(
            reboque_id: $data['id'] ?? null,
            reboque_tipo: $data['tipo'] ?? null,
            reboque_placa: $data['placa'] ?? null,
            reboque_modelo: $data['modelo'] ?? null,
            reboque_ano: $data['ano'] ?? null,
            reboque_cor: $data['cor'] ?? null,
            reboque_veiculo_id: $data['veiculo_id'] ?? null,
        );
    }
}
