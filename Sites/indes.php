###Para conectarse con otras bdd

<?php
  try {
    $user = 'grupoXX';
    $password = 'grupoXX';
    $databaseName = 'grupoXXe3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
    $user2 = 'grupoXX';
    $password2 = 'grupoXX';
    $databaseName2 = 'grupoXXe3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>

