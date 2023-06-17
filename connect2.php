<?php
$dbname = "mirai";
$user = "postgres";
$password = "mirai123";
$host = "localhost";
$port = "5432";

$conn = pg_connect("dbname=$dbname
 user=$user
  password=$password
   host=$host
    port=$port");
if (!$conn) {
    echo "Não foi possível conectar ao banco de dados.";
    exit;
}
echo "Conexão bem sucedida!";
?>