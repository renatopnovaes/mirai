<?php

namespace Domain\Entity;

class MotoristaEntity
{
    public function __construct(
        private readonly int|null $motorista_id,
        private readonly string $motorista_nome
        
    ) {}
    
    public function getMotoristaId(): int
    {
        return $this->motorista_id;
    }

    public function getMotoristaNome(): string
    {
        return $this->motorista_nome;
    }

}