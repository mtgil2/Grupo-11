CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
importar_datos_artista()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla1 RECORD;
tupla2 RECORD;
contrasena integer;
i integer;
j integer;
nombre_minuscula varchar;
nombre_final varchar;

-- definimos nuestra función
BEGIN

    PERFORM setseed(1);
    j := 1;

    FOR tupla1 in (SELECT * FROM Usuarios)

    LOOP
        j := j + 1;
    END LOOP;

    i := j;
    -- FOR tupla IN (SELECT * FROM dblink('dbname=grupo61e3 user=grupo61 password=divinas123 port=5432','SELECT * FROM companias') AS f(codigo char, nombre varchar))
    FOR tupla2 IN (SELECT * FROM Artista)
    LOOP
        nombre_minuscula := LOWER(tupla2.nombre_escenico);
        nombre_final := REPLACE(nombre_minuscula, ' ', '_');
        contrasena := floor(random()*(200-100+1)+100);
        INSERT INTO Usuarios values(i, nombre_final, contrasena, 'artista');
    
        i := i + 1;
    END LOOP;


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql