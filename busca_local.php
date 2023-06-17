<?php
//header('Content-Type: application/json');
include_once('connect.php');

$sql = 'SELECT * FROM public.origem ORDER BY 1' ;
$stmt = $pdo->query($sql);

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$local = $resultado;

//echo json_encode($local);

?>

