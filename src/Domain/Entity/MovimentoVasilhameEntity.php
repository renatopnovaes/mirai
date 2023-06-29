<?php

namespace Domain\Entity;

class MovimentoVasilhameEntity
{

    public function __construct(
        private readonly int|null $movimento_vasilhame_id,
        private readonly int $movimento_vasilhame_carga,
        private readonly string $movimento_vasilhame_origem,
        private readonly string $movimento_vasilhame_destino,
        private readonly string $movimento_vasilhame_produto,
        private readonly int $movimento_vasilhame_quantidade,
        private readonly int $movimento_vasilhame_observacao


    ) {
    }

    public function getMovimentoVasilhameId(): int
    {
        return $this->movimento_vasilhame_id;
    }

    public function getMovimentoVasilhameCarga(): int
    {
        return $this->movimento_vasilhame_carga;
    }

    public function getMovimentoVasilhameOrigem(): int
    {
        return $this->movimento_vasilhame_origem;
    }

    public function getMovimentoVasilhameDestino(): int
    {
        return $this->movimento_vasilhame_destino;
    }

    public function getMovimentoVasilhameProduto(): int
    {
        return $this->movimento_vasilhame_produto;
    }

    public function getMovimentoVasilhameQuantidade(): int
    {
        return $this->movimento_vasilhame_quantidade;
    }

    public function getMovimentoVasilhameObservacao(): string
    {
        return $this->movimento_vasilhame_observacao;
    }
}
