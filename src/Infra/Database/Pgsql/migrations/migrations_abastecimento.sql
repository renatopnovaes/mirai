-- Tabela para armazenar informações sobre viagens
-- Script de reinício para a tabela 'viagens', incluindo DROP TABLE se existir
DROP TABLE IF EXISTS viagens CASCADE;

-- Criação da tabela viagens
CREATE TABLE viagens (
    id SERIAL PRIMARY KEY,
    data_saida DATE NOT NULL,
    observacao TEXT,
    rota_id INT NOT NULL REFERENCES rotas(id),
    veiculo_id INT NOT NULL REFERENCES veiculos(id),
    reboque_id INT NOT NULL REFERENCES reboques(id),
    km_saida INT NOT NULL,
    km_chegada INT NOT NULL,
    data_chegada DATE NOT NULL,
    motorista_id INT NOT NULL REFERENCES papeis(id),  
    viagem_concluida BOOLEAN DEFAULT false NOT NULL,
    
    -- Data e hora de criação do registro
    data_criacao TIMESTAMP DEFAULT current_timestamp
);

-- Comentário sobre a tabela
COMMENT ON TABLE viagens IS 'Tabela para armazenar informações sobre viagens.';




-- Comentários das colunas
COMMENT ON COLUMN viagens.id IS 'Identificador único da viagem.';
COMMENT ON COLUMN viagens.data_saida IS 'Data de saída da viagem.';
COMMENT ON COLUMN viagens.observacao IS 'Observações sobre a viagem.';
COMMENT ON COLUMN viagens.rota_id IS 'Chave estrangeira que faz referência à rota da viagem.';
COMMENT ON COLUMN viagens.veiculo_id IS 'Chave estrangeira que faz referência ao veículo utilizado na viagem.';
COMMENT ON COLUMN viagens.reboque_id IS 'Chave estrangeira que faz referência ao reboque utilizado na viagem.';
COMMENT ON COLUMN viagens.km_saida IS 'Quilometragem de saída da viagem (inteiro).';
COMMENT ON COLUMN viagens.km_chegada IS 'Quilometragem de chegada da viagem (inteiro).';
COMMENT ON COLUMN viagens.data_chegada IS 'Data de chegada da viagem.';
COMMENT ON COLUMN viagens.motorista_id IS 'Chave estrangeira que faz referência ao motorista da viagem.';
COMMENT ON COLUMN viagens.viagem_concluida IS 'Indica se a viagem foi concluída ou não.';
COMMENT ON COLUMN viagens.data_criacao IS 'Data e hora de criação do registro na tabela.';



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






CREATE TABLE reboques (
  id SERIAL PRIMARY KEY,
  tipo VARCHAR(50) NOT NULL,
  placa VARCHAR(15) NOT NULL UNIQUE,
  modelo VARCHAR(100) NOT NULL,
  ano INTEGER,
  cor VARCHAR(50),
  CONSTRAINT fk_veiculo_id FOREIGN KEY (veiculo_id) REFERENCES veiculos(id) ON DELETE SET NULL
);

-- Adicionando comentários à tabela reboques
COMMENT ON TABLE reboques IS 'Tabela para armazenar informações sobre reboques';

-- Adicionando comentários às colunas da tabela reboques
COMMENT ON COLUMN reboques.id IS 'Identificador único do reboque';
COMMENT ON COLUMN reboques.tipo IS 'Tipo do reboque (carreta, semirreboque, etc.)';
COMMENT ON COLUMN reboques.placa IS 'Placa do reboque';
COMMENT ON COLUMN reboques.modelo IS 'Modelo do reboque';
COMMENT ON COLUMN reboques.ano IS 'Ano de fabricação do reboque';
COMMENT ON COLUMN reboques.cor IS 'Cor do reboque';
COMMENT ON COLUMN reboques.veiculo_id IS 'ID do veículo ao qual o reboque está associado (pode ser nulo se não estiver associado a um veículo)';
COMMENT ON CONSTRAINT fk_veiculo_id ON reboques IS 'Chave estrangeira que faz referência à tabela de veículos.';
COMMENT ON CONSTRAINT reboques_veiculo_id_fkey ON reboques IS 'Restrição UNIQUE para a coluna veiculo_id';

create view vw_motoristas as (
select pf.nome, p.id
from pessoa_fisica pf
inner join (select id, pfid, funcao from papeis where funcao = 'MOTORISTA') p on pf.id=p.pfid)


drop table if exists abastecimento
-- Criação da tabela "abastecimento"
CREATE TABLE abastecimentos (
    id serial PRIMARY KEY, -- Identificador único do registro de abastecimento.
    viagem_id INT REFERENCES viagens(id), -- Chave estrangeira que faz referência à viagem associada ao abastecimento.
    data_abastecimento DATE NOT NULL, -- Data do abastecimento.
    litros DECIMAL(10, 2) NOT NULL, -- Quantidade de litros abastecidos.
    valor_total DECIMAL(10, 2) NOT NULL, -- Valor total gasto no abastecimento.
    posto_abastecimento VARCHAR(255) NOT NULL, -- Nome do posto de abastecimento.
    quilometragem INT NOT NULL, -- Quilometragem no momento do abastecimento.
    observacoes TEXT, -- Observação ou notas relacionadas ao abastecimento.
    valor_litro DECIMAL(10, 2) NOT NULL, -- Valor do litro de combustível no momento do abastecimento.
    data_criacao TIMESTAMP DEFAULT current_timestamp -- Data e hora de criação do registro na tabela.
);

-- Comentários das colunas da tabela "abastecimento".
COMMENT ON TABLE abastecimentos IS 'Tabela para armazenar informações de abastecimento associadas a viagens.';
COMMENT ON COLUMN abastecimentos.id IS 'Identificador único do registro de abastecimento.';
COMMENT ON COLUMN abastecimentos.viagem_id IS 'Chave estrangeira que faz referência à viagem associada ao abastecimento.';
COMMENT ON COLUMN abastecimentos.data_abastecimento IS 'Data do abastecimento.';
COMMENT ON COLUMN abastecimentos.litros IS 'Quantidade de litros abastecidos.';
COMMENT ON COLUMN abastecimentos.valor_total IS 'Valor total gasto no abastecimento.';
COMMENT ON COLUMN abastecimentos.posto_abastecimento IS 'Nome do posto de abastecimento.';
COMMENT ON COLUMN abastecimentos.quilometragem IS 'Quilometragem no momento do abastecimento.';
COMMENT ON COLUMN abastecimentos.observacoes IS 'Observação ou notas relacionadas ao abastecimento.';
COMMENT ON COLUMN abastecimentos.valor_litro IS 'Valor do litro de combustível no momento do abastecimento.';
COMMENT ON COLUMN abastecimentos.data_criacao IS 'Data e hora de criação do registro na tabela.';
COMMENT ON CONSTRAINT abastecimentos_viagem_id_fkey ON abastecimentos IS 'Chave estrangeira que faz referência à tabela de viagens.';