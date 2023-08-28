-------------------------VIAGENS--------------------------
-- Tabela para armazenar informações sobre viagens
-- Script de reinício para a tabela 'viagens', incluindo DROP TABLE se existir
DROP TABLE IF EXISTS viagens;

-- Tabela para armazenar informações sobre viagens
CREATE TABLE viagens (
    id SERIAL PRIMARY KEY, -- Identificador único da viagem
    data_saida DATE NOT NULL, -- Data de saída da viagem (obrigatória)
    data_chegada DATE, -- Data de chegada da viagem
    viagem_concluida BOOLEAN NOT NULL DEFAULT false, -- Indica se a viagem foi concluída (padrão: false)
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação do registro (preenchida automaticamente)
    data_alteracao TIMESTAMP, -- Data da última alteração do registro (começa com NULL)
    data_finalizacao TIMESTAMP, -- Data de finalização da viagem (preenchida automaticamente quando viagem_concluida for true pela primeira vez)
    descricao TEXT -- Descrição opcional da viagem
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




