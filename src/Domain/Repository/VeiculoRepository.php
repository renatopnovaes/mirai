<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;

class VeiculoRepository
{
    public function getVeiculosLivres(): array | string
    {

        $conn = DBConnection::getInstance();
        $sql = "
        SELECT 
            id,
            placa            
        FROM public.veiculos;
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
