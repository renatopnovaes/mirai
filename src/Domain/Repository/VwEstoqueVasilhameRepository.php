<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class VwEstoqueVasilhameRepository
{
    public function getAllVwEstoqueVasilhame(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "          
        SELECT 
            * 
        FROM vw_estoque_vasilhame;
        ";

        try {

            $stt = $conn->prepare($sql);

            $stt->execute();
            $result = $stt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
        return $result;
    }
}
