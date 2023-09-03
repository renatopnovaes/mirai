<?php

namespace Domain\Entity;

class RotaEntity
{
    public function __construct(
        private readonly int|null $id,
        private readonly string $origem,
        private readonly string $destino,
        private readonly int $distancia_km,
        private readonly string $descricao,
        private readonly string $observacao,
        private readonly int $duracao_minutos
    ) {
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }

    public function getDestino(): string
    {
        return $this->destino;
    }

    public function getDistancia(): int
    {
        return $this->distancia_km;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function getDuracao(): int
    {
        return $this->duracao_minutos;
    }
}
