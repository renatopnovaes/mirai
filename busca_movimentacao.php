<?php

include_once('connect.php');

$sql = "SELECT id_movimentacao_vasilhame, data_carga, carga, vasilhame, origem, destino, quantidade_vasilhame, desc_mov_vasilhame
FROM public.movimento_vasilhame;";

$stmt = $pdo->query($sql);

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$estoque = $resultado;
?>