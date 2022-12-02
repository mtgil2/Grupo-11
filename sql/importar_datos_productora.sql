CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
importar_datos_productora()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD;
contrasena integer;
i integer;
nombre_minuscula varchar;
nombre_final varchar;

-- definimos nuestra función
BEGIN

    PERFORM setseed(1);

    i := 1;
    -- FOR tupla IN (SELECT * FROM dblink('dbname=grupo61e3 user=grupo61 password=divinas123 port=5432','SELECT * FROM companias') AS f(codigo char, nombre varchar))
    FOR tupla IN (SELECT * FROM productora)
    LOOP
        nombre_minuscula := LOWER(tupla.nombre_productora);
        nombre_final := REPLACE(nombre_minuscula, ' ', '_');
        contrasena := floor(random()*(200-100+1)+100);
        INSERT INTO usuarios values(i, nombre_final, contrasena, 'productora');
    
        i := i + 1;
    END LOOP;


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql
