<?php

namespace Domain\Entity;

class VeiculosEntity
{
    public function __construct(
        private readonly int|null $id,
        private readonly string $marca,
        private readonly string $modelo,
        private readonly int $ano,
        private readonly string $cor,
        private readonly float $preco,
        private readonly ?string $placa
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

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPlaca(): ?string
    {
        return $this->placa;
    }
}
