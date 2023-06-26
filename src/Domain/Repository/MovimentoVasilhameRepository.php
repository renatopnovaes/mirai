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
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
        return $result;
    }



    public function addMovimentoVasilhame($numeroCarga, $origem, $destino, $produto, $quantidade,  $observacoes)
    {


        $conn = DBConnection::getInstance();

        $sql = "
        INSERT INTO public.movimento_vasilhame(            
            movimento_vasilhame_carga, 
            movimento_vasilhame_origem, 
            movimento_vasilhame_destino, 
            movimento_vasilhame_produto, 
            movimento_vasilhame_quantidade, 
            movimento_vasilhame_observacao            
            ) 
            VALUES (
            :numeroCarga,
            :origem,
            :destino,
            :produto,
            :quantidade,
            :observacoes                
            )
        ";


        try {
            $stt = $conn->prepare($sql);

            $stt->bindValue(':numeroCarga', $numeroCarga, \PDO::PARAM_INT);
            $stt->bindValue(':origem', $origem, \PDO::PARAM_INT);
            $stt->bindValue(':destino', $destino, \PDO::PARAM_INT);
            $stt->bindValue(':produto', $produto, \PDO::PARAM_STR);
            $stt->bindValue(':quantidade',  $quantidade, \PDO::PARAM_INT);
            $stt->bindValue(':observacoes', $observacoes, \PDO::PARAM_STR);



            $stt->execute();
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    }
}
