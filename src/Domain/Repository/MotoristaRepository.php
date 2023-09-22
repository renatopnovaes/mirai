<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;

class MotoristaRepository
{
    public function getAllMotoristas(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                id,
                nome
            FROM public.vw_motoristas;
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
