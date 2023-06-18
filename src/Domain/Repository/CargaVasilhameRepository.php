<?php
namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class CargaVasilhameRepository
{
   public function getAllCargaVasilhame(): array|string
   {
     $conn = DBConnection::getInstance();

     $sql = "
        SELECT 
            carga_id,
            carga_numero,
            carga_data
	    FROM public.carga_vasilhame;       
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


   public function insertCargaVasilhame($numero, $data)
{
    $conn = DBConnection::getInstance();

        $sql = "
        INSERT INTO public.carga_vasilhame (carga_numero, carga_data)
        VALUES (:numero, :data)
    ";

    try {
        $stt = $conn->prepare($sql);

        $stt->bindValue(':numero', $numero, \PDO::PARAM_INT);
        $stt->bindValue(':data', $data, \PDO::PARAM_STR);

        $stt->execute();
    } catch (\Exception $e) {
        echo "Erro ao executar a consulta: " . $e->getMessage();
    }
}
};
