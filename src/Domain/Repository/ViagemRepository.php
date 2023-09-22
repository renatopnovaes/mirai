<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class ViagemRepository
{
    public function addViagem($data_saida, $observacao, $rota, $veiculo, $reboque, $km_saida, $km_chegada, $data_chegada, $motorista): void
    {

        $conn = DBConnection::getInstance();

        $sql = "
    INSERT INTO public.viagens (
        data_saida,
        observacao,
        rota_id,
        veiculo_id,
        reboque_id,
        km_saida,
        km_chegada,
        data_chegada,
        motorista_id,
        viagem_concluida
    ) VALUES (
        :data_saida,
        :observacao,
        :rota,
        :veiculo,
        :reboque,
        :km_saida,
        :km_chegada,
        :data_chegada,
        :motorista,
        :viagem_concluida
    )
";

        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':data_saida', $data_saida, \PDO::PARAM_STR);
            $stt->bindValue(':observacao', $observacao, \PDO::PARAM_STR);
            $stt->bindValue(':rota', $rota, \PDO::PARAM_INT);
            $stt->bindValue(':veiculo', $veiculo, \PDO::PARAM_INT);
            $stt->bindValue(':reboque', $reboque, \PDO::PARAM_INT);
            $stt->bindValue(':km_saida', $km_saida, \PDO::PARAM_INT);
            $stt->bindValue(':km_chegada', $km_chegada, \PDO::PARAM_INT);
            $stt->bindValue(':data_chegada', $data_chegada, \PDO::PARAM_STR);
            $stt->bindValue(':motorista', $motorista, \PDO::PARAM_INT);
            $stt->bindValue(':viagem_concluida', false, \PDO::PARAM_BOOL);

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
            public.vw_viagens
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
