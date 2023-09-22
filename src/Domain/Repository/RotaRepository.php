<?php

namespace Domain\Repository;

use Infra\Database\Pgsql\DBConnection;


class RotaRepository
{
    public function getAllRotas(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                id,
                origem,
                destino,
                distancia_km,
                descricao,
                observacao,
                duracao_minutos
            FROM public.rotas;
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

    public function getRotas(): array|string
    {
        $conn = DBConnection::getInstance();

        $sql = "
            SELECT 
                id,               
                rota
            FROM public.rotas
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

    public function addRotas($origem, $destino, $distancia_km, $descricao, $observacao, $duracao_minutos): void
    {
        $conn = DBConnection::getInstance();

        $sql = "
        INSERT INTO public.rotas (
            origem,
            destino,
            distancia_km,
            descricao,
            observacao,
            duracao_minutos

        ) VALUES (
            :origem,
            :destino,
            :distancia_km,
            :descricao,
            :observacao,
            :duracao_minutos
        )";


        try {
            $stt = $conn->prepare($sql);


            $stt->bindValue(':origem', $origem, \PDO::PARAM_STR);
            $stt->bindValue(':destino', $destino, \PDO::PARAM_STR);
            $stt->bindValue(':distancia_km', $distancia_km, \PDO::PARAM_INT);
            $stt->bindValue(':descricao', $descricao, \PDO::PARAM_STR);
            $stt->bindValue(':observacao', $observacao, \PDO::PARAM_STR);
            $stt->bindValue(':duracao_minutos', $duracao_minutos, \PDO::PARAM_INT);

            $stt->execute();
        } catch (\Exception $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    }
}
