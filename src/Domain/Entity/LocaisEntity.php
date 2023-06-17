<?php

namespace Domain\Entity;

class LocaisEntity
{

    public function __construct(
        private readonly int|null $local_id,
        private readonly string $local_nome
    ) {}

    public function getLocalId(): int
    {
        return $this->local_id;
    }

    public function getLocalName(): string
    {
        return $this->local_nome;
    }
}
