<?php

namespace Domain\Factory;

use Domain\Entity\AjusteVasilhameEntity;
use Domain\Repository\AjusteVasilhameRepository;

abstract class AjusteVasilhameFactory extends AbstractFactory
{
    public static function getRepository()
    {
       return new AjusteVasilhameRepository();
    }
    
    public static function getEntity(array|null $data): AjusteVasilhameEntity
    {
        return new AjusteVasilhameEntity(
            local: $data['local'] ?? null,
            produto: $data['produto'] ?? null,
            quantidade: $data['quantidade'] ?? null,
        );
    }
}

