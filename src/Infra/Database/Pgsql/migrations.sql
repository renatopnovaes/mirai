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
  movimento_vasilhame_origem INTEGER,
  movimento_vasilhame_destino INTEGER,
  movimento_vasilhame_produto INTEGER,
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

-------Criar View Movimento Vasilhame-----------
--DROP VIEW IF EXISTS vw_movimento_vasilhame
CREATE OR REPLACE VIEW vw_movimento_vasilhame AS
SELECT
  mv.movimento_vasilhame_id
	, mv.movimento_vasilhame_carga AS carga
	, c.carga_data AS data_carga
	, p.produto_nome AS produto
	, mv.movimento_vasilhame_quantidade AS quantidade
	, lo.local_nome AS origem
	, ld.local_nome AS destino
	, mv.movimento_vasilhame_observacao AS observacoes

FROM
  public.movimento_vasilhame mv
  INNER JOIN public.locais lo ON mv.movimento_vasilhame_origem = lo.local_id
  INNER JOIN public.locais ld ON mv.movimento_vasilhame_destino = ld.local_id
  INNER JOIN public.produto p ON mv.movimento_vasilhame_produto = p.produto_id
  INNER JOIN public.carga_vasilhame c ON c.carga_numero=mv.movimento_vasilhame_carga
ORDER BY 1 desc;


------------------------------- criar tabela ajuste_vasilhame ----------------------------


CREATE TABLE public.ajuste_vasilhame
(
    id_ajuste serial NOT NULL,
    local smallint NOT NULL,
    produto integer NOT NULL,
    quantidade integer NOT NULL,
    carimbo_tempo timestamp without time zone NOT NULL,
    CONSTRAINT local_fk PRIMARY KEY (id_ajuste),
    CONSTRAINT local_fk FOREIGN KEY (local)
        REFERENCES public.locais (local_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT produto_fk FOREIGN KEY (produto)
        REFERENCES public.produto (produto_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);

ALTER TABLE IF EXISTS public.ajuste_vasilhame
    OWNER to postgres;



-----------------Criar function para atualizar o carimbo--------------------

CREATE OR REPLACE FUNCTION atualizar_carimbo_tempo()
  RETURNS TRIGGER AS
$$
BEGIN
  NEW.carimbo_tempo := CURRENT_TIMESTAMP;
  RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER inserir_carimbo_tempo
  BEFORE INSERT ON public.ajuste_vasilhame
  FOR EACH ROW
  EXECUTE FUNCTION atualizar_carimbo_tempo();

  