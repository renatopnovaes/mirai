----criar tabela carga_vasilhame-----
CREATE TABLE carga_vasilhame
(
  id_carga SERIAL PRIMARY KEY,
  numero_carga INTEGER UNIQUE,
  data_carga DATE
);

----criar tabela movimento_vasilhame----
CREATE TABLE movimento_vasilhame
(
  movimento_vasilhame_id SERIAL PRIMARY KEY,
  movimento_vasilhame_carga INTEGER,
  movimento_vasilhame_origem VARCHAR(255),
  movimento_vasilhame_destino VARCHAR(255),
  movimento_vasilhame_produto VARCHAR(255),
  movimento_vasilhame_quantidade INTEGER,
  movimento_vasilhame_observacao VARCHAR(255)
);

----chaves estrangeiras movimento vasilhame----

ALTER TABLE public.movimento_vasilhame
ADD CONSTRAINT fk_movimento_vasilhame_origem
FOREIGN KEY (movimento_vasilhame_origem)
REFERENCES public.locais (local_id);

-----------------

ALTER TABLE public.movimento_vasilhame
ADD CONSTRAINT fk_movimento_vasilhame_destino
FOREIGN KEY (movimento_vasilhame_destino)
REFERENCES public.locais (local_id);

-----------------


-- Adicionar a chave estrangeira na coluna movimento_vasilhame_carga
ALTER TABLE public.movimento_vasilhame
ADD CONSTRAINT fk_movimento_vasilhame_carga
FOREIGN KEY (movimento_vasilhame_carga)
REFERENCES public.carga_vasilhame (carga_numero);



-- Adicionar a chave estrangeira na coluna movimento_vasilhame_carga
ALTER TABLE public.movimento_vasilhame
ADD CONSTRAINT fk_movimento_vasilhame_carga
FOREIGN KEY (movimento_vasilhame_carga)
REFERENCES public.carga_vasilhame (carga_numero);


