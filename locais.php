<?php
include_once('busca_local.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-light">




  <div class="container">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid  bg-danger">
        <a class="navbar-brand" href="#">Distribuidora Miraí</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="estoque.php">Movimentação</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" disabled>Locais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="produtos.php" >Produtos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h3 class="center">Cadastro de Origens e Destinos</h3>

    <form id="local_form" action="insere_local.php" method="POST" onsubmit="validar(event)">
      <div class="row">
        <div class="col-4">
          <input type="text" class="form-control" id="local" name="local_nome"
            placeholder="Insira o nome da origem ou destino" aria-label="First name">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <button type="submit">Salvar</button>
        </div>
      </div>
      <script>
        async function validar(event) {
          event.preventDefault(); // impede o envio do formulário           

          const valor = document.getElementById('local').value;


          try {
            const response = await fetch('verificar_local.php', {

              method: "POST",
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                valor
              }),


            });

            const {
              existe,
              erro
            } = await response.json();
            if (existe) {
              alert('O valor já existe no banco de dados!');
            } else {
              if (erro) {
                return alert(erro);
              }

              event.target.submit();

            }
          } catch (error) {
            console.error(error);
          }
        }
      </script>
    </form>
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col"  class="col-1">#</th>
          <th scope="col" class="col-sm">Local</th>
          <th scope="col" class="col-1" >Editar</th>

        </tr>
      </thead>
      <tbody>
        <?php
        
        foreach($resultado as $resultados){ 
       echo  '<tr>';
          echo '<th scope="row" >'.$resultados['local_id'].'</th>';
          echo '<td>'.$resultados['local_nome'].'</td>';
          echo '<td><button onclick="pegarIdLocal(this)" class="btn-editar" id="' . $resultados['local_id'] . '"><i class="bi bi-pencil"></i></button></td>';  

      echo '</tr>';
    }
        ?>

        <script>
          function pegarIdLocal(button) {
            let pegarLinha = button.parentNode.parentNode;
            let botaoTd = pegarLinha.querySelector("button").id;
            let tdValor = button.parentNode.previousElementSibling.innerText;
            let pegarDescricao = button.parentNode.previousElementSibling;

            let criarInput = document.createElement('input');
            criarInput.setAttribute('type', 'text');
            criarInput.setAttribute('value', tdValor);

            pegarDescricao.innerHTML = '';

            let inputFoco = pegarDescricao.appendChild(criarInput);
            inputFoco.addEventListener('blur', (e) => {
              let pegarNovoValor = {
                local_nome: inputFoco.value,
                local_id: botaoTd
              };

              let url = "update_local.php";

              const options = {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(pegarNovoValor)
              };

              fetch(url, options)
                .then(response => {
                  if (response.ok) {
                    return response.json();
                  } else {
                    throw new Error('Erro ao enviar a requisição');
                  }
                })
                .then(data => {
                  // Exibir alerta com base na resposta do servidor
                  alert('Requisição enviada com sucesso!');

                  // Atualizar o conteúdo da célula da tabela com o valor do input
                  pegarDescricao.innerHTML = inputFoco.value;

                  console.log(data); // Faça o que desejar com os dados recebidos
                })
                .catch(error => {
                  console.error('Erro na requisição', error);
                });
            });

            // Remover o foco do input ao clicar fora dele
            document.addEventListener('click', (event) => {
              if (event.target !== inputFoco) {
                inputFoco.blur();
              }
            });
          }

        </script>

      </tbody>
    </table>


  </div>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
</body>

</html>