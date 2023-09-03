<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class ViagemRepository
{
    public function addViagem($data_saida, $observacao, $rota): void
    {
        $conn = DBConnection::getInstance();

        $sql = "
        INSERT INTO public.viagens (
            data_saida,
            rota,
            descricao

        ) VALUES (
            :data_saida,
            :rota,
            :descricao
        )
    ";
        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':data_saida', $data_saida, \PDO::PARAM_STR);
            $stt->bindValue(':rota', $rota, \PDO::PARAM_INT);
            $stt->bindValue(':descricao', $observacao, \PDO::PARAM_STR);

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
            *
        FROM         
            public.vw_viagens";

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
