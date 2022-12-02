<?php
    require("../config/conexion.php");
    include('../templates/header.html');
    session_start();
    $codigo = $_SESSION['username'];

    # Obtener último id propuesta
    $query_par = "SELECT MAX(id) FROM propuesta_vuelo;";
    $result_par = $db_par -> prepare($query_par);
    $result_par -> execute();
    $max_id = $result_par -> fetchAll();
    $propuesta_id = $max_id[0][0] + 1;

    # Obtener último id vuelo
    $query_id_vuelo = "SELECT MAX(id) FROM vuelos;";
    $result_id_vuelo = $db_par -> prepare($query_id_vuelo);
    $result_id_vuelo -> execute();
    $max_id_vuelo = $result_id_vuelo -> fetchAll();
    $vuelo_id = $max_id_vuelo[0][0] + 1;

    # Obtener ultimo id fpl
    // $query_id_fpl = "SELECT MAX(id) FROM fpl;";
    // $result_id_fpl = $db_par -> prepare($query_id_fpl);
    // $result_id_fpl -> execute();
    // $max_id_fpl = $result_id_fpl -> fetchAll();
    // $fpl_id = $max_id_fpl[0][0] + 1;

    # PAR
    # Crea la propuesta de vuelo 
    $fecha_propuesta = date("Y-m-d");
    $query_par_propuesta = "INSERT INTO propuesta_vuelo (id, fecha_envio_propuesta, codigo_compania) 
VALUES ('$propuesta_id', '$fecha_propuesta', '$codigo');";
    $result_par2 = $db_par -> prepare($query_par_propuesta);
    $result_par2 -> execute();
    $result_par2 -> fetchAll();

    # Crear fpl
//     $query_par_fpl = "INSERT INTO fpl (id, id_ruta, velocidad, altitud, tipo_vuelo, max_pasajeros, realizado, pasaporte_piloto, pasaporte_copiloto) 
// VALUES ('$fpl_id', '1', '0', '0', 'comercial', '10', 'no realizado', 'J22810925', 'H50641909');";
//     $result_par_fpl = $db_par -> prepare($query_par_fpl);
//     $result_par_fpl -> execute();
//     $result_par_fpl -> fetchAll();


    # Obtener aerodromos
    $aerodromo_salida = $_POST['aerodromo_salida'];
    $query_salida = "SELECT id FROM aerodromos WHERE nombre='$aerodromo_salida';";
    $result_salida = $db_par -> prepare($query_salida);
    $result_salida -> execute();
    $aerodromo_salida = $result_salida -> fetchAll();
    $aerodromo_salida = $aerodromo_salida[0][0];

    $aerodromo_llegada = $_POST['aerodromo_llegada'];
    $query_llegada = "SELECT id FROM aerodromos WHERE nombre='$aerodromo_llegada';";
    $result_llegada = $db_par -> prepare($query_llegada);
    $result_llegada -> execute();
    $aerodromo_llegada = $result_llegada -> fetchAll();
    $aerodromo_llegada = $aerodromo_llegada[0][0];


    # Crear vuelo 
    $fecha_salida = $_POST["fecha_salida"];
    $fecha_llegada = $_POST["fecha_llegada"];
    $codigo_aeronave = $_POST["codigo_aeronave"];
    $codigo_vuelo = $_POST["codigo_vuelo"];
    $query_par3 = "INSERT INTO vuelos (id, codigo, id_propuesta_vuelo, estado, fecha_estimada_salida, fecha_estimada_llegada, id_aerodromo_salida, id_aerodromo_llegada, codigo_aeronave)
VALUES ('$vuelo_id', '$codigo_vuelo', '$propuesta_id', 'pendiente', '$fecha_salida', '$fecha_llegada', '$aerodromo_salida', '$aerodromo_llegada', '$codigo_aeronave');";
    $result_par3 = $db_par -> prepare($query_par3);
    $result_par3 -> execute();
    $log = $result_par3 -> fetchAll();
?>
<html>
    <head>
        <title>Redirigiendo a la página de inicio</title>
        <META HTTP-EQUIV="REFRESH" CONTENT="5;https://codd.ing.puc.cl/~grupo14/index.php">
    </head>
    <body>
        Propuesta creada con éxito, en 5 segundos será redirigido a la página principal!
    </body>
</html>