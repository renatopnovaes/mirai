<?php

namespace Domain\Entity;

use DateTime;

class ViagemEntity
{
    public function __construct(
        private readonly DateTime $data_saida,
        private readonly DateTime $data_chegada,
        private readonly bool $flag_viagem

    ) {
    }

    public function getDataSaida(): DateTime
    {
        return $this->data_saida;
    }

    public function getDataChegada(): DateTime
    {
        return $this->data_chegada;
    }

    public function getFlagViagem(): bool
    {
        return $this->flag_viagem;
    }
}
