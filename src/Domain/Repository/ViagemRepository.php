<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class ViagemRepository
{
    public function addViagem($data_saida, $observacao): void
    {
        $conn = DBConnection::getInstance();

        $sql = "
        INSERT INTO public.viagens (
            data_saida,
            observacao

        ) VALUES (
            :data_saida,
            :observacao
        )
    ";
        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':data_saida', $data_saida, \PDO::PARAM_STR);
            $stt->bindValue(':observacao', $observacao, \PDO::PARAM_STR);

            $stt->execute();
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    }

    public function getViagemAberta(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
        SELECT
            id,
            data_saida,
            observacao
        FROM
            public.viagens
        WHERE 
            viagem_concluida = false";

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
