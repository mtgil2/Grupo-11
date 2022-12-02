<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    //ARTISTAS
    $query = "SELECT nombre_escenico, id_artista FROM artista;";
    $result = $db -> prepare($query);
    $result -> execute();
    $artistas = $result -> fetchAll();
    $n_artistas_malo = 0;
    


    foreach ($artistas as $artista){

        $username = str_replace(" ", "_", $artista[0]);
        $psw = rand(10000000, 99999999);
        $tipo = "artista";
        $query = "SELECT importar_usuarios('$username'::varchar, '$psw'::varchar, '$tipo'::varchar , $artista[1]);";
        #echo $query;



        // Ejecutamos las queries para efectivamente insertar los datos
        $result = $db -> prepare($query);
        $result -> execute();
        $resultado_artistas = $result -> fetchAll();
        echo $resultado_artistas;

        
        $resultado_artistas = $resultado_artistas[0]["importar_usuarios"];
        echo $resultado_artistas;
        if ($resultado_artistas == 0){
            $n_artistas_malo = $n_artistas_malo + 1;
        }
    }
        

    //PRODUCTORAS
    $query = "SELECT nombre, id_productora, pais FROM productora;";
    $result = $db -> prepare($query);
    $result -> execute();
    $productoras = $result -> fetchAll();
    $n_productoras_malo = 0;


    foreach ($productoras as $productora){

        $username = str_replace(" ", "_", $productora[0]);
        $username = $username . "_" . $productora[2];
        $psw = rand(10000000, 99999999);
        $tipo = "productora";
        $query = "SELECT importar_usuarios('$username'::varchar, '$psw'::varchar, '$tipo'::varchar , $productora[1]);";


        // Ejecutamos las querys para efectivamente insertar los datos
        $result = $db -> prepare($query);
        $result -> execute();
        $resultado_productoras = $result -> fetchAll();
        $resultado_productoras = $resultado_productoras[0]["importar_usuarios"];
        if ($resultado_productoras == 0){
            $n_productoras_malo = $n_productoras_malo + 1;
        }
    }

    // AGREGAR HTML
    if ($n_artistas_malo != 0 || $n_productoras_malo != 0){
        echo "ERROR ".$n_productoras_malo." productoras.";
        echo "\n";
        echo "ERROR ".$n_artistas_malo." artistas.";

    } else{
        echo "Se crearon exitosamente todos los usuarios.";
    }

    // Mostramos los cambios en una nueva tabla de usuarios
    $query = "SELECT * FROM usuarios;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

?>
<br></br>
    <form action='../index.php' align="center" method='get'>
        <input class='btn btn-outline-success' type='submit' value='Volver'>
    </form>

    <br></br>

    <body class="bg-light">
    <div class="container"> 

        <table align="center" class='table table-light table-hover w-auto table-bordered border-success table-striped'>
            <thead class="table-success" style = "background-color: blue">
                <tr>
                <th>Id</th>
                <th>Nombre usuario</th>
                <th>Contraseña</th>
                <th>Tipo</th>
               
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    for ($i = 0; $i < 4; $i++) {
                        echo "<td>$usuario[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>
</html>
