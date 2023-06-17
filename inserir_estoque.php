<?php 
include_once('connect.php');

$dados = array_filter($_POST);

if (empty($dados['observacoes'])) {
    $dados['observacoes'] = ''; // Ou qualquer outro valor padrão desejado
}

$sql = "INSERT INTO public.movimento_vasilhame(
    data_carga, carga, vasilhame, origem, destino, quantidade_vasilhame, desc_mov_vasilhame)
   VALUES ( :data_carga, :carga, :produto, :origem, :destino, :quantidade_total, :observacoes);";

$stmt = $pdo->prepare($sql);
$stmt->execute($dados);

header('Location: estoque.php');

?>