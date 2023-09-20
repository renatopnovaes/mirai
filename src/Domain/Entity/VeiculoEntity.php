<?php

namespace Domain\Entity;

class VeiculoEntity
{
    public function __construct(
        private readonly int|null $id,
        private readonly string $marca,
        private readonly string $modelo,
        private readonly int $ano,
        private readonly string $cor,
        private readonly ?string $placa,
        private readonly int $capacidade,
        private readonly ?string $tipo,
        private readonly ?int $status,
        private readonly ?string $observacao
    ) {
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function getCor(): string
    {
        return $this->cor;
    }


    public function getPlaca(): ?string
    {
        return $this->placa;
    }

    public function getCapacidade(): int
    {
        return $this->capacidade;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }
}
