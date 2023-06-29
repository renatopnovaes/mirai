<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class VwMovimentoVasilhameRepository
{
    public function getAllVwMovimentoVasilhame(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "          
            SELECT 
                movimento_vasilhame_id, 
                carga, 
                data_carga, 
                produto, 
                quantidade, 
                origem, 
                destino,
                observacoes
	        FROM public.vw_movimento_vasilhame;
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
