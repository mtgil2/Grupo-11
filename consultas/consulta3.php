<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre = $_POST;
 

  #Se construye la consulta como un string
 	$query = "SELECT tour.nombre FROM Tour, Artista, Eventos where Artista.nombre = '$nombre' AND Artista.id_tour = Tour.id_tour AND Tour.fecha_inicio = (SELECT MAX(fecha_inicio) FROM Tour);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre Tour</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($artistas as $artista) {
          echo "<tr><td>$artista[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
