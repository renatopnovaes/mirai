<?php

namespace Domain\Entity;

class VwEstoqueVasilhameEntity
{

    public function __construct(
        private readonly string $local,
        private readonly string $produto,
        private readonly int $total

    ) {
    }

    public function getVwEstoqueVasilhameLocal(): string
    {
        return $this->local;
    }

    public function getVwEstoqueVasilhameCargaProduto(): string
    {
        return $this->produto;
    }

    public function getVwEstoqueVasilhameCargatotal(): int
    {
        return $this->total;
    }
}
