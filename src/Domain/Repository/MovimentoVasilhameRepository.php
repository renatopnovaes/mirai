<?php
namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class MovimentoVasilhameRepository
{
    public function getAllMovimentoVasilhame(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                movimento_vasilhame_id,
                movimento_vasilhame_carga,
                movimento_vasilhame_origem,
                movimento_vasilhame_destino, 
                movimento_vasilhame_produto, 
                movimento_vasilhame_quantidade, 
                movimento_vasilhame_observacao
            FROM public.movimento_vasilhame;
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