CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
crear_tabla ()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE

-- definimos nuestra función
BEGIN

    DROP TABLE IF EXISTS usuarios;
    CREATE TABLE IF NOT EXISTS usuarios (
    id         serial PRIMARY KEY,
    username   varchar(20),
    contrasena varchar(20),
    tipo       varchar(20)
    );
   
-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql