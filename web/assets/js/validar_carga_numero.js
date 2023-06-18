import { getListCargaVasilhame } from "./fetch/carga_vasilhame.js";


  const inputCarga = document.querySelector('input[name="carga"]');
  const btnSalvarCarga = document.getElementById("salvar_carga");
  const inputDataCarga = document.querySelector('input[name="data_carga"]');

  btnSalvarCarga.addEventListener("click", async () => {
    try {
      const data = await getListCargaVasilhame();

      if (data && Array.isArray(data)) {
        const cargasVasilhame = data;
        const carga = inputCarga.value.trim();
        const data_carga = inputDataCarga.value

        // Verifique se o número de carga existe na lista
        if (cargasVasilhame.some(item => item.carga_numero === parseInt(carga))) {
          alert("Carga já existe");
          inputCarga.value = ''; // Resetar o valor do campo
        } else {
          // Prosseguir com a lógica de salvar o registro
          const formData = new FormData();
          formData.append('numero', carga);
          formData.append('data', data_carga);


          // Enviar a requisição usando fetch
          fetch('/mirai/src/Domain/Repository/CargaVasilhameRepository.php', {
            method: 'POST',
            body: formData
          })
            .then(function (response) {
              if (response.ok) {
                console.log("Requisição bem-sucedida, faça o que desejar aqui");
                return response.text();
              } else {
                // Erro na requisição, trate o erro aqui
                throw new Error('Erro na requisição.');
              }
            })
            .then(function (data) {
              console.log(data);
            })
            .catch(function (error) {
              console.error(error);
            });

          console.log("Carga válida. Salvando registro...");
        }
      }
    } catch (err) {
      console.log(err);
    }
  });
;
