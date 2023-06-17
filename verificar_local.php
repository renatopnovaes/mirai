<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include_once('connect.php');

$data = null;
if (empty($_POST)) {
  $data = json_decode(file_get_contents('php://input'), true);
}


$local = !empty($data['valor']) ?  $data['valor'] : null;

$resposta = ['erro' => 'Valor não especificado'];

if ($local) {
    $sql = 'SELECT COUNT(*) FROM public.origem WHERE local_nome = :local';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':local', $local);

    $stmt->execute();
    $resultado = $stmt->fetchColumn();   

    if ($resultado > 0) {
        $resposta = array('existe' => true);
    } else {
        $resposta = array('existe' => false);
    }
}



die(json_encode($resposta));
