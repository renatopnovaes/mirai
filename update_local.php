<?php

include_once('connect.php');
$novo_valor = null;

if (empty($_POST)) {
    $novo_valor = json_decode(file_get_contents('php://input'), true);
} 

$local_id = intval($novo_valor['local_id']);

$novo_valor = !empty($novo_valor['local_nome']) ?  $novo_valor['local_nome'] : null;

$resposta = ['erro' => 'Valor não especificado'];

If ($novo_valor){
    $update = 'UPDATE public.origem
                SET local_nome = :local_nome
                WHERE local_id = :local_id';
    $stmt = $pdo->prepare($update);

    $stmt->bindParam(':local_id', $local_id);
    $stmt->bindParam(':local_nome', $novo_valor);

    $stmt->execute();

   if($stmt){$resposta = array('novo' => true);
   } else {
       $resposta = array('novo' => false);
   }

   }

   die(json_encode($resposta));

   




    













?>

