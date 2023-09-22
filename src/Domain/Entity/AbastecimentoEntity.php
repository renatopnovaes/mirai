<?php

namespace Domain\Entity;

class AbastecimentoEntity
{
    public function __construct(

        private readonly int $posto,
        private readonly int $litros,
        private readonly int $valor_litro,
        private readonly int $valor,
        private readonly string $data,
        private readonly string $observacao,
        private readonly int $km
    ) {
    }

    public function getPosto(): int
    {
        return $this->posto;
    }

    public function getLitros(): int
    {
        return $this->litros;
    }

    public function getValorLitro(): int
    {
        return $this->valor_litro;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function getKm(): int
    {
        return $this->km;
    }
}
