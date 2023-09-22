<?php

namespace Domain\Entity;

class ReboqueEntity
{
    public function __construct(
        private readonly int|null $reboque_id,
        private readonly string $reboque_tipo,
        private readonly string $reboque_placa,
        private readonly string $reboque_modelo,
        private readonly int $reboque_ano,
        private readonly string $reboque_cor,
        private readonly int $reboque_veiculo_id
    ) {
    }

    public function getReboqueId(): int
    {
        return $this->reboque_id;
    }

    public function getReboqueTipo(): string
    {
        return $this->reboque_tipo;
    }

    public function getReboquePlaca(): string
    {
        return $this->reboque_placa;
    }

    public function getReboqueModelo(): string
    {
        return $this->reboque_modelo;
    }

    public function getReboqueAno(): int
    {
        return $this->reboque_ano;
    }

    public function getReboqueCor(): string
    {
        return $this->reboque_cor;
    }

    public function getReboqueVeiculoId(): int
    {
        return $this->reboque_veiculo_id;
    }
}
