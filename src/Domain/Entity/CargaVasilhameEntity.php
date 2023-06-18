<?php

namespace Domain\Entity;

class CargaVasilhameEntity
{

    public function __construct(
        private readonly int|null $carga_id,
        private readonly int $carga_numero,
        private readonly \DateTime $carga_data

    ) {}

    public function getCargaId(): ?int
    {
        return $this->carga_id;
    }

    public function getCargaNumber(): int
    {
        return $this->carga_numero;
    }

    public function getCargaDate(): string
    {
        return $this->carga_data->format('d/m/Y');
    }
}
