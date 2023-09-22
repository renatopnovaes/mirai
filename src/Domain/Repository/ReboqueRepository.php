<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;

class ReboqueRepository
{
    public function getAllReboques(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                id,                
                placa               
            FROM public.reboques;
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