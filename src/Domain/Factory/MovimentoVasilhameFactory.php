<?php

namespace Domain\Factory;

use Domain\Repository\MovimentoVasilhameRepository;
use Domain\Entity\MovimentoVasilhameEntity;

abstract class MovimentoVasilhameFactory extends AbstractFactory
{
    public static function getRepository(): MovimentoVasilhameRepository
    {
        return new MovimentoVasilhameRepository();
    }

    public static function getEntity(array|null $data): MovimentoVasilhameEntity
    {
        return new MovimentoVasilhameEntity(
            movimento_vasilhame_id: $data['movimento_vasilhame_id'] ?? null,
            movimento_vasilhame_carga: $data['movimento_vasilhame_carga'] ?? null,
            movimento_vasilhame_origem: $data['movimento_vasilhame_origem'] ?? null,
            movimento_vasilhame_destino: $data['movimento_vasilhame_destino'] ?? null,
            movimento_vasilhame_produto: $data['movimento_vasilhame_produto'] ?? null,
            movimento_vasilhame_quantidade: $data['movimento_vasilhame_quantidade'] ?? null,
            movimento_vasilhame_observacao: $data['movimento_vasilhame_observacao'] ?? null
        );
    }
}
