<?php

namespace Domain\Entity;

class AjusteVasilhameEntity
{

    public function __construct(

        private readonly int $local,
        private readonly int $produto,
        private readonly int $quantidade

    ) {}

    public function getLocal(): int
    {
        return $this->local;
    }

    public function getProduto(): int
    {
        return $this->produto;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
