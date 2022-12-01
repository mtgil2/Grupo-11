
<!--CODIGO PROYECTO EJEMPLO -->


<?php

// Este archivo se puede importar en cada archivo .php, y se puede tener
// aquí todo lo necesario para no tener que agregarlo para cada archivo.
// No tiene nada de mágico, es un archivo php cualquiera con un nombre arbitrario.

// Cargamos los datos para poder iniciar la BDD
#require_once __DIR__ . "/config/data.php";

// Se conecta a la BDD
#require_once __DIR__ . "/config/conexion.php";

// Se crea siempre una sesión
#session_start();


// Funciones propias de utilidad

/**
 * Volver al inicio, tiene que se llamada antes de entregar HTML.
 */
#function go_home() {
 # header("Location: " . '/~grupo11/');
 ## exit();
#}



// Este archivo se puede importar en cada archivo .php, y se puede tener
// aquí todo lo necesario para no tener que agregarlo para cada archivo.
// No tiene nada de mágico, es un archivo php cualquiera con un nombre arbitrario.

// Cargamos los datos para poder iniciar la BDD
require_once __DIR__ . "/config/data.php";

// Se conecta a la BDD
require_once __DIR__ . "/config/conexion.php";

// Se crea siempre una sesión
session_start();


// Funciones propias de utilidad

/**
 * Volver al inicio, tiene que se llamada antes de entregar HTML.
 */
function go_home() {
  header('Refresh: 0; url = ./index.php');
  exit();
}

/**
 * Ejemplo de componentes, donde uno llama a la función y se genera HTML
 * NOTA: Aunque esto esta funcional, el nombre de las columnas es el mismo
 *       que en la BDD, se podria modificar para poder elegir que nombre mostrar.
 *       [[Ver PDOStatement::fetch](https://www.php.net/manual/es/pdostatement.fetch.php)]
 *
 * @param PDOStatement $query