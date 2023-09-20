<?php

namespace Domain\Factory;

use Domain\Entity\VeiculoEntity;
use Domain\Repository\VeiculoRepository;


abstract class VeiculoFactory extends AbstractFactory
{

    public static function getRepository()
    {
        return new VeiculoRepository();
    }

    public static function getEntity(array|null $data): VeiculoEntity
    {
        return new VeiculoEntity(
            id: $data['id'] ?? null,
            marca: $data['marca'] ?? null,
            modelo: $data['modelo'] ?? null,
            ano: $data['ano'] ?? null,
            cor: $data['cor'] ?? null,
            capacidade: $data['capacidade'] ?? null,
            placa: $data['placa'] ?? null,
            tipo: $data['tipo'] ?? null,
            status: $data['status'] ?? null,
            observacao: $data['observacao'] ?? null,
        );
    }
}