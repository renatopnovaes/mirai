<?php

namespace Domain\Entity;

class ProdutoEntity
{    
    public function __construct(
        private readonly int|null $produto_id,
        private readonly string $produto_nome,
        private readonly int $produto_quantidade
   ) {}

   public function getProdutoId() : int
   {
        return $this->produto_id;
   }

   public function getProdutoNome() : string
   {
        return $this->produto_nome;
   }

   public function getProdutoQuantidade() : int
   {
        return $this->produto_quantidade;
   }
}

