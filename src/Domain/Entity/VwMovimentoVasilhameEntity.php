<?php

namespace Domain\Entity;

class VwMovimentoVasilhameEntity
{

    public function __construct(
        private readonly int $movimento_vasilhame_id,
        private readonly int $carga,
        private readonly \DateTime $data_carga,
        private readonly string $produto,
        private readonly int $quantidade,
        private readonly string $origem,
        private readonly string $destino,
        private readonly string $observacoes


    ) {
    }

    public function getVwMovimentoVasilhameId(): int
    {
        return $this->movimento_vasilhame_id;
    }

    public function getVwMovimentoVasilhameCarga(): int
    {
        return $this->carga;
    }

    public function getVwMovimentoVasilhameData(): string
    {
        return $this->data_carga->format('d/m/Y');
    }

    public function getVwMovimentoVasilhameProduto(): int
    {
        return $this->produto;
    }

    public function getVwMovimentoVasilhameQuantidade(): string
    {
        return $this->quantidade;
    }

    public function getVwMovimentoVasilhameOrigem(): int
    {
        return $this->origem;
    }

    public function getVwMovimentoVasilhameDestino(): string
    {
        return $this->destino;
    }

    public function getVwMovimentoVasilhameObservacoes(): string
    {
        return $this->observacoes;
    }
}
