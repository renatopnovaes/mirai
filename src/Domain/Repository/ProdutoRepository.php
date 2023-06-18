<?php
namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class ProdutoRepository
{
    public function getAllProdutos(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                produto_id,
                produto_nome,
                produto_quantidade
            FROM public.produto;
        ";

        try {

            $stt = $conn->prepare($sql);

            $stt->execute();
            $result = $stt->fetchAll(\PDO::FETCH_ASSOC);

        } catch(\Exception $e){
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
        return $result;
    }
}