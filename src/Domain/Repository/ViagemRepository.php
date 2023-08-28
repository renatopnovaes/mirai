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
};
