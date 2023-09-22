<?php

namespace Domain\Entity;

use DateTime;

class ViagemEntity
{
    public function __construct(
        private readonly DateTime $data_saida,
        private readonly string|null $observacao, // Adicionado o campo "observacao"
        private readonly int|null $rota_id, // Adicionado o campo "rota_id"
        private readonly int|null $veiculo_id, // Adicionado o campo "veiculo_id"
        private readonly int|null $reboque_id, // Adicionado o campo "reboque_id"
        private readonly int|null $km_saida, // Adicionado o campo "km_saida"
        private readonly int|null $km_chegada, // Adicionado o campo "km_chegada"
        private readonly DateTime $data_chegada,
        private readonly int|null $motorista_id, // Adicionado o campo "motorista_id"
        private readonly string|null $viagem_status, // Adicionado o campo "viagem_status"
        private readonly bool $viagem_concluida
    ) {
    }

    public function getDataSaida(): DateTime
    {
        return $this->data_saida;
    }

    public function getObservacao(): ?string // Método para acessar "observacao"
    {
        return $this->observacao;
    }

    public function getRotaId(): ?int // Método para acessar "rota_id"
    {
        return $this->rota_id;
    }

    public function getVeiculoId(): ?int // Método para acessar "veiculo_id"
    {
        return $this->veiculo_id;
    }

    public function getReboqueId(): ?int // Método para acessar "reboque_id"
    {
        return $this->reboque_id;
    }

    public function getKmSaida(): ?int // Método para acessar "km_saida"
    {
        return $this->km_saida;
    }

    public function getKmChegada(): ?int // Método para acessar "km_chegada"
    {
        return $this->km_chegada;
    }

    public function getDataChegada(): DateTime
    {
        return $this->data_chegada;
    }

    public function getMotoristaId(): ?int // Método para acessar "motorista_id"
    {
        return $this->motorista_id;
    }

    public function getViagemStatus(): ?string // Método para acessar "viagem_status"
    {
        return $this->viagem_status;
    }

    public function isViagemConcluida(): bool // Método para acessar "viagem_concluida"
    {
        return $this->viagem_concluida;
    }
}
