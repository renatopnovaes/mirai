<?php
namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class LocaisRepository
{
   public function getAllLocais(): array|string
   {
     $conn = DBConnection::getInstance();

     $sql = "
        SELECT
            local_id,
            local_nome
        FROM public.locais
         ";

     try {
        
         $stt = $conn->prepare($sql);

         $stt->execute();
         $result = $stt->fetchAll(\PDO::FETCH_ASSOC);

     } catch(\Exception $e) {
         echo "Erro ao executar a consulta: " . $e->getMessage();
     }
     return $result;
   }
};

