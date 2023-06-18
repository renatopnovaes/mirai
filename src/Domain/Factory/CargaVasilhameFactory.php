<?php

namespace Domain\Factory;

use Domain\Entity\CargaVasilhameEntity;
use Domain\Repository\CargaVasilhameRepository;

abstract class CargaVasilhameFactory extends AbstractFactory
{
    public static function getRepository()
    {
       return new CargaVasilhameRepository();
    }
    
    public static function getEntity(array|null $data): CargaVasilhameEntity
    {
        return new CargaVasilhameEntity(
            carga_id: $data['carga_id'] ?? null,
            carga_numero: $data['carga_numero'] ?? null,
            carga_data: $data['carga_data'] ?? null
        );
    }
}