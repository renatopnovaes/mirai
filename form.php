<form method="POST" action="processar_formulario.php">
  <div id="produtos">
    <div class="produto">
      <label>Produto:</label>
      <input type="text" name="produto[]" required>
      <label>Quantidade:</label>
      <input type="number" name="quantidade[]" required>
      <label>Descrição:</label>
      <textarea name="descricao[]"></textarea>
    </div>
  </div>

  <button type="button" onclick="adicionarProduto()">Adicionar Produto</button>

  <button type="submit">Enviar</button>
</form>

<script>
    function adicionarProduto() {
        var produtosDiv = document.getElementById("produtos");
        var novoProduto = document.createElement("div");
        novoProduto.className = "produto";
        novoProduto.innerHTML = `
          <label>Produto:</label>
          <input type="text" name="produto[]" required>
          <label>Quantidade:</label>
          <input type="number" name="quantidade[]" required>
          <label>Descrição:</label>
          <textarea name="descricao[]"></textarea>
        `;
        produtosDiv.appendChild(novoProduto);

        if (produtosDiv.children.length > 1) {
            var botaoRemover = document.createElement("button");
            botaoRemover.type = "button";
            botaoRemover.textContent = "Remover";
            botaoRemover.onclick = function() {
                removerProduto(novoProduto);
            };
            novoProduto.appendChild(botaoRemover);
        }
    }

    function removerProduto(linhaProduto) {
        linhaProduto.remove();
    }
</script>


<div class="row">
                    <select name="" id="mySelect">
                        <option value="">Escolha um Produto</option>
                    </select>
                </div>

                <script>
                    // Função para atualizar o <select> com os resultados da consulta
                    function populateSelect() {
                        fetch('busca_produto.php') // Substitua pelo nome do seu arquivo PHP
                            .then(response => response.json())
                            .then(options => {
                                const selectElement = document.getElementById('mySelect');

                                // Limpe o conteúdo atual do <select>
                                selectElement.innerHTML = '';

                                // Popule o <select> com as opções obtidas do arquivo PHP
                                options.forEach(option => {
                                    const optionElement = document.createElement('option');
                                    optionElement.value = option.produto_id;
                                    optionElement.textContent = option.produto_nome;
                                    selectElement.appendChild(optionElement);
                                });
                            })
                            .catch(error => {
                                console.log('Erro ao obter os dados do servidor:', error);
                            });
                    }

                    // Chame a função populateSelect() inicialmente para carregar os dados
                    populateSelect();

                </script>
