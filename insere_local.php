<?php

include_once('connect.php');

$origem_destino = $_POST['local_nome'];



$sql = "INSERT INTO public.origem (local_nome) VALUES (:local)";
$stmt = $pdo->prepare($sql);


$stmt->bindParam(':local', $origem_destino );

//$local = $origem_destino;


$stmt->execute();

if($stmt==true){
    echo "<script>alert('A inserção foi concluída com sucesso!'); window.location.href = 'locais.php';</script>";
   
  exit;

} else {
    echo "<script>alert('Não foi possível concluir a inserção.');</script>";
}

?>






