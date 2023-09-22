<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;

class AbastecimentoRepository
{
    public function addAbastecimento($viagem_id, $posto, $litros, $valor_litro, $valor, $data, $observacao, $km): void
    {

        $conn = DBConnection::getInstance();

        $sql = "
            INSERT INTO public.abastecimentos (
                viagem_id,
                posto_abastecimento,
                litros,
                valor_litro,
                valor_total,
                data_abastecimento,
                observacoes,
                quilometragem
            ) VALUES (
                :viagem_id,
                :posto,
                :litros,
                :valor_litro,
                :valor,
                :data,
                :observacao,
                :km
            )
        ";

        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':viagem_id', $viagem_id, \PDO::PARAM_INT);
            $stt->bindValue(':posto', $posto, \PDO::PARAM_INT);
            $stt->bindValue(':litros', $litros, \PDO::PARAM_INT);
            $stt->bindValue(':valor_litro', $valor_litro, \PDO::PARAM_INT);
            $stt->bindValue(':valor', $valor, \PDO::PARAM_INT);
            $stt->bindValue(':data', $data, \PDO::PARAM_STR);
            $stt->bindValue(':observacao', $observacao, \PDO::PARAM_STR);
            $stt->bindValue(':km', $km, \PDO::PARAM_INT);

            $stt->execute();
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    }
}
