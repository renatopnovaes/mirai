<?php

namespace Domain\Factory;

use Domain\Repository\VwMovimentoVasilhameRepository;
use Domain\Entity\VwMovimentoVasilhameEntity;

abstract class VwMovimentoVasilhameFactory extends AbstractFactory
{
    public static function getRepository(): VwMovimentoVasilhameRepository
    {
        return new VwMovimentoVasilhameRepository();
    }

    public static function getEntity(array|null $data): VwMovimentoVasilhameEntity
    {
        return new VwMovimentoVasilhameEntity(
            movimento_vasilhame_id: $data['movimento_vasilhame_id'] ?? null,
            carga: $data['carga'] ?? null,
            data_carga: $data['data_carga'] ?? null,
            produto: $data['produto'] ?? null,
            quantidade: $data['quantidade'] ?? null,
            origem: $data['origem'] ?? null,
            destino: $data['destino'] ?? null,
            observacoes: $data['observacoes'] ?? null

        );
    }
}
