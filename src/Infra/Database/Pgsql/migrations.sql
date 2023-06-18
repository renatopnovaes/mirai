----criar tabela carga_vasilhame-----
CREATE TABLE carga_vasilhame (
  id_carga SERIAL PRIMARY KEY,
  numero_carga INTEGER UNIQUE,
  data_carga DATE
);

----criar tabela movimento_vasilhame----
CREATE TABLE movimento_vasilhame (
    movimento_vasilhame_id SERIAL PRIMARY KEY,
    movimento_vasilhame_carga INTEGER,
    movimento_vasilhame_origem VARCHAR(255),
    movimento_vasilhame_destino VARCHAR(255),
    movimento_vasilhame_produto VARCHAR(255),
    movimento_vasilhame_quantidade INTEGER,
    movimento_vasilhame_observacao VARCHAR(255)
);

----



