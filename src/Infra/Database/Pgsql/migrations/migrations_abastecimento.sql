-- Tabela para armazenar informações sobre viagens
-- Script de reinício para a tabela 'viagens', incluindo DROP TABLE se existir
DROP TABLE IF EXISTS viagens CASCADE;

-- Tabela para armazenar informações sobre viagens
CREATE TABLE viagens (
    id SERIAL PRIMARY KEY, -- Identificador único da viagem
    data_saida DATE NOT NULL, -- Data de saída da viagem (obrigatória)
    data_chegada DATE, -- Data de chegada da viagem
    viagem_concluida BOOLEAN NOT NULL DEFAULT false, -- Indica se a viagem foi concluída (padrão: false)
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação do registro (preenchida automaticamente)
    data_alteracao TIMESTAMP, -- Data da última alteração do registro (começa com NULL)
    data_finalizacao TIMESTAMP, -- Data de finalização da viagem (preenchida automaticamente quando viagem_concluida for true pela primeira vez)
    descricao TEXT, -- Descrição opcional da viagem
    rota INT, -- Nova coluna "rota" do tipo INT
    status INT -- Nova coluna "status" do tipo INT
);

-- Comentários para a tabela e colunas
COMMENT ON TABLE viagens IS 'Tabela para armazenar informações sobre viagens';
COMMENT ON COLUMN viagens.id IS 'Identificador único da viagem';
COMMENT ON COLUMN viagens.data_saida IS 'Data de saída da viagem (obrigatória)';
COMMENT ON COLUMN viagens.data_chegada IS 'Data de chegada da viagem';
COMMENT ON COLUMN viagens.viagem_concluida IS 'Indica se a viagem foi concluída (padrão: false)';
COMMENT ON COLUMN viagens.data_criacao IS 'Data de criação do registro (preenchida automaticamente)';
COMMENT ON COLUMN viagens.data_alteracao IS 'Data da última alteração do registro (começa com NULL)';
COMMENT ON COLUMN viagens.data_finalizacao IS 'Data de finalização da viagem (preenchida automaticamente quando viagem_concluida for true pela primeira vez)';
COMMENT ON COLUMN viagens.descricao IS 'Descrição opcional da viagem';
COMMENT ON COLUMN viagens.rota IS 'ID da rota associada à viagem';
COMMENT ON COLUMN viagens.status IS 'Status da viagem (por exemplo, 1 para ativa, 2 para concluída, etc.)';

------------------VEICULOS-------------------------

-- Drop da tabela 'veiculos' (caso exista)
DROP TABLE IF EXISTS veiculos CASCADE;

CREATE TABLE veiculos (
  id SERIAL PRIMARY KEY,
  tipo VARCHAR(50) NOT NULL,
  placa VARCHAR(15) NOT NULL UNIQUE,
  modelo VARCHAR(100) NOT NULL,
  quantidade_litros DECIMAL(10, 2),
  viagem_id INTEGER,
  FOREIGN KEY (viagem_id) REFERENCES viagens(id) ON DELETE SET NULL
);


-- Adicionando comentários às colunas da tabela veiculos
COMMENT ON TABLE veiculos IS 'Tabela para armazenar informações sobre veículos';
COMMENT ON COLUMN veiculos.id IS 'Identificador único do veículo';
COMMENT ON COLUMN veiculos.tipo IS 'Tipo do veículo (carro, caminhão, carreta, cavalinho)';
COMMENT ON COLUMN veiculos.placa IS 'Placa do veículo';
COMMENT ON COLUMN veiculos.modelo IS 'Modelo do veículo';
COMMENT ON COLUMN veiculos.quantidade_litros IS 'Quantidade de litros que comporta o tanque do veículo';
COMMENT ON COLUMN veiculos.viagem_id IS 'ID da viagem associada (pode ser nulo se o veículo não estiver em uma viagem)';


-- -- Criação da função para verificar a unicidade condicional
CREATE OR REPLACE FUNCTION check_viagem_id_uniqueness()
RETURNS TRIGGER AS $$
BEGIN
  IF NEW.viagem_id IS NOT NULL THEN
    IF EXISTS (
      SELECT 1
      FROM veiculos
      WHERE viagem_id = NEW.viagem_id
        AND id <> NEW.id -- Para permitir a atualização do mesmo veículo sem problemas
    ) THEN
      RAISE EXCEPTION 'Já existe um veículo com o mesmo viagem_id';
    END IF;
  END IF;
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Criação de uma trigger para chamar a função antes da inserção ou atualização
-- Esta trigger garante que o campo viagem_id seja único entre os veículos, mas permite
-- que o mesmo veículo seja atualizado sem problemas, mesmo que mantenha o mesmo viagem_id.
CREATE TRIGGER before_insert_update_veiculos
BEFORE INSERT OR UPDATE ON veiculos
FOR EACH ROW
EXECUTE FUNCTION check_viagem_id_uniqueness();

-- Adicionando comentário à restrição UNIQUE na coluna viagem_id
COMMENT ON CONSTRAINT veiculos_viagem_id_fkey ON veiculos IS 'Restrição UNIQUE para a coluna viagem_id';

----------------CARRETAS----------------------------------



-- Criação da tabela para armazenar informações sobre carretas
DROP TABLE IF EXISTS carretas CASCADE;

CREATE TABLE carretas (
  id SERIAL PRIMARY KEY,
  placa VARCHAR(15) NOT NULL UNIQUE, -- Definindo a coluna placa como única
  modelo VARCHAR(100) NOT NULL,
  capacidade_carga INTEGER,
  cavalinho_id INTEGER,
  FOREIGN KEY (cavalinho_id) REFERENCES veiculos(id)
);

COMMENT ON TABLE carretas IS 'Tabela para armazenar informações sobre carretas';

COMMENT ON COLUMN carretas.id IS 'Identificador único da carreta';
COMMENT ON COLUMN carretas.placa IS 'Placa da carreta';
COMMENT ON COLUMN carretas.modelo IS 'Modelo da carreta';
COMMENT ON COLUMN carretas.capacidade_carga IS 'Capacidade de carga da carreta';
COMMENT ON COLUMN carretas.cavalinho_id IS 'ID do veículo do tipo "cavalinho" que puxa a carreta (pode ser nulo)';

-- Criação da função para verificar a unicidade condicional da coluna cavalinho_id
CREATE OR REPLACE FUNCTION check_cavalinho_id_uniqueness()
RETURNS TRIGGER AS $$
BEGIN
  IF NEW.cavalinho_id IS NOT NULL THEN
    -- Verificar se o veículo vinculado tem tipo "cavalinho"
    IF NOT EXISTS (
      SELECT 1
      FROM veiculos
      WHERE id = NEW.cavalinho_id
        AND tipo = 'cavalinho'
    ) THEN
      RAISE EXCEPTION 'Apenas veículos do tipo "cavalinho" podem ser vinculados';
    END IF;
    -- Verificar se já existe outra carreta vinculada ao mesmo veículo "cavalinho"
    IF EXISTS (
      SELECT 1
      FROM carretas
      WHERE cavalinho_id = NEW.cavalinho_id
        AND id <> NEW.id -- Para permitir a atualização da mesma carreta sem problemas
    ) THEN
      RAISE EXCEPTION 'Outra carreta já está vinculada ao mesmo veículo "cavalinho"';
    END IF;
  END IF;
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;



-- Criação da trigger para chamar a função antes da inserção ou atualização
CREATE TRIGGER before_insert_update_carretas
BEFORE INSERT OR UPDATE ON carretas
FOR EACH ROW
EXECUTE FUNCTION check_cavalinho_id_uniqueness();

------------------------- PESSOA FISICA -----------------------------
-- Tabela para armazenar informações sobre pessoas físicas
CREATE TABLE pessoa_fisica (
  id SERIAL PRIMARY KEY, -- Identificador único da pessoa física
  cpf VARCHAR(11) UNIQUE NOT NULL, -- CPF como chave única
  nome VARCHAR(100) NOT NULL, -- Nome da pessoa física
  data_nascimento DATE NOT NULL, -- Data de nascimento da pessoa física
  endereco VARCHAR(200), -- Endereço da pessoa física
  email VARCHAR(100) UNIQUE -- Endereço de email da pessoa física, com restrição UNIQUE
);

-- Comentários para a tabela pessoa_fisica
COMMENT ON TABLE pessoa_fisica IS 'Tabela para armazenar informações sobre pessoas físicas';

-- Comentários para as colunas da tabela pessoa_fisica
COMMENT ON COLUMN pessoa_fisica.id IS 'Identificador único da pessoa física';
COMMENT ON COLUMN pessoa_fisica.cpf IS 'CPF como chave única';
COMMENT ON COLUMN pessoa_fisica.nome IS 'Nome da pessoa física';
COMMENT ON COLUMN pessoa_fisica.data_nascimento IS 'Data de nascimento da pessoa física';
COMMENT ON COLUMN pessoa_fisica.endereco IS 'Endereço da pessoa física';
COMMENT ON COLUMN pessoa_fisica.email IS 'Endereço de email da pessoa física, com restrição UNIQUE';

----------ROTAS------------------

 DROP TABLE IF EXISTS public.rotas;

CREATE TABLE IF NOT EXISTS public.rotas
(
    id SERIAL NOT NULL,
    rota text COLLATE pg_catalog."default" NOT NULL,
    distancia_km numeric(10,2) NOT NULL,
	  origem text COLLATE pg_catalog."default" NOT NULL,
	  destino text COLLATE pg_catalog."default" NOT NULL,
    duracao_minutos numeric(8,2) NOT NULL,
    descricao text COLLATE pg_catalog."default",
	  observacao text COLLATE pg_catalog."default",	
    data_criacao timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT rotas_pkey PRIMARY KEY (id)
)


-- Comentários para a tabela e colunas
COMMENT ON TABLE public.rotas IS 'Tabela para armazenar informações sobre rotas';

COMMENT ON COLUMN public.rotas.id IS 'Identificador único da rota';
COMMENT ON COLUMN public.rotas.rota IS 'Nome da rota';
COMMENT ON COLUMN public.rotas.distancia_km IS 'Distância da rota em quilômetros';
COMMENT ON COLUMN public.rotas.origem IS 'Cidade de origem da rota';
COMMENT ON COLUMN public.rotas.destino IS 'Cidade de destino da rota';
COMMENT ON COLUMN public.rotas.duracao_minutos IS 'Duração estimada da rota em minutos';
COMMENT ON COLUMN public.rotas.descricao IS 'Descrição da rota (opcional)';
COMMENT ON COLUMN public.rotas.observacao IS 'Observações sobre a rota (opcional)';
COMMENT ON COLUMN public.rotas.data_criacao IS 'Data de criação do registro (preenchida automaticamente)';

-- Comentário para a chave primária
COMMENT ON CONSTRAINT rotas_pkey ON public.rotas IS 'Chave primária da tabela rotas';


-- Adicione uma chave estrangeira na coluna "rota" da tabela "viagens"
ALTER TABLE public.viagens
ADD CONSTRAINT fk_rota FOREIGN KEY (rota) REFERENCES rotas(id);


-----PAPEIS---------

 DROP TABLE IF EXISTS papeis;

CREATE TABLE papeis (
    id serial PRIMARY KEY,
    pfid INT REFERENCES pessoa_fisica(id),
    dt_criacao TIMESTAMP DEFAULT current_timestamp,
    dt_inativacao TIMESTAMP,
    us_alteracao INT,
    status BOOLEAN DEFAULT true,
    observacao TEXT
);

COMMENT ON TABLE papeis IS 'Tabela para armazenar informações de papéis associados a pessoas físicas.';
COMMENT ON COLUMN papeis.id IS 'Identificador único do papel.';
COMMENT ON COLUMN papeis.pfid IS 'Chave estrangeira que faz referência à pessoa física associada ao papel.';
COMMENT ON COLUMN papeis.dt_criacao IS 'Data e hora de criação do registro.';
COMMENT ON COLUMN papeis.dt_inativacao IS 'Data e hora de inativação do papel, se aplicável.';
COMMENT ON COLUMN papeis.us_alteracao IS 'Chave estrangeira que faz referência ao usuário responsável pela última alteração do papel.';
COMMENT ON COLUMN papeis.status IS 'Status do papel (ativo ou inativo).';
COMMENT ON COLUMN papeis.observacao IS 'Observação ou notas relacionadas ao papel.';




 DROP TABLE IF EXISTS viagem_composicao;
CREATE TABLE viagem_composicao (
    id serial PRIMARY KEY,
    viagem_id INT REFERENCES viagens(id),
    veiculo_id INT REFERENCES veiculos(id),
    veiculo_composicao_id INT, -- Coluna para acomodar a futura chave estrangeira para "veiculo_composicao"
    pessoa_fisica_id INT REFERENCES papeis(id), -- Chave estrangeira para o campo "id" da tabela "papeis"    
    
    -- Data e hora de criação do registro
    data_criacao TIMESTAMP DEFAULT current_timestamp,
    
    -- Restrições para garantir que as combinações de valores sejam únicas em cada linha
    CONSTRAINT uk_viagem_composicao_unique_values UNIQUE (viagem_id, veiculo_id, veiculo_composicao_id, pessoa_fisica_id),
    
    -- Restrições de chave estrangeira para viagem_id e veiculo_id
    CONSTRAINT fk_viagem FOREIGN KEY (viagem_id) REFERENCES viagens(id),
    CONSTRAINT fk_veiculo FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);



-- Comentário sobre a tabela
COMMENT ON TABLE viagem_composicao IS 'Tabela para registrar a composição de uma viagem.';

-- Comentários das colunas
COMMENT ON COLUMN viagem_composicao.id IS 'Identificador único da composição da viagem.';
COMMENT ON COLUMN viagem_composicao.viagem_id IS 'Chave estrangeira que faz referência à viagem à qual esta composição pertence.';
COMMENT ON COLUMN viagem_composicao.veiculo_id IS 'Chave estrangeira que faz referência ao veículo principal utilizado na viagem (caminhão ou carreta).';
COMMENT ON COLUMN viagem_composicao.veiculo_composicao_id IS 'Chave estrangeira que fará referência à composição do veículo, especialmente no caso de carretas (será adicionada posteriormente).';
COMMENT ON COLUMN viagem_composicao.pessoa_fisica_id IS 'Chave estrangeira que faz referência à pessoa física associada ao papel na tabela "papeis".';
COMMENT ON COLUMN viagem_composicao.data_criacao IS 'Data e hora de criação do registro na tabela.';

-- Comentário das chaves estrangeiras
COMMENT ON CONSTRAINT fk_viagem ON viagem_composicao IS 'Chave estrangeira que faz referência à tabela de viagens.';
COMMENT ON CONSTRAINT fk_veiculo ON viagem_composicao IS 'Chave estrangeira que faz referência à tabela de veículos.';
