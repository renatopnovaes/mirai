<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;

class AjusteVasilhameRepository
{
    public function addAjusteVasilhame($local, $produto, $quantidade)
    {
        $conn = DBConnection::getInstance();

        $sql = "
            INSERT INTO public.ajuste_vasilhame(
                local, 
                produto, 
                quantidade
            ) VALUES (
                :local, 
                :produto, 
                :quantidade);
            ";

        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':local', $local, \PDO::PARAM_INT);
            $stt->bindValue(':produto', $produto, \PDO::PARAM_INT);
            $stt->bindValue(':quantidade', $quantidade, \PDO::PARAM_INT);

            $stt->execute();
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    }
}
