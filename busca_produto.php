<?php
//header('Content-Type: application/json');
include_once('connect.php');

$sql = 'SELECT * FROM public.produto ORDER BY 1' ;
$stmt = $pdo->query($sql);

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$produto = $resultado;


//echo json_encode($resultado);
 
?>



