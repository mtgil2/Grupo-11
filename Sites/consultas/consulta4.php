<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$nombre = $_POST[nombre];


 	$query = "SELECT DISTINCT p.nombre_pais FROM Ciudad AS c, Pais AS p,(SELECT f.id_evento FROM (SELECT DISTINCT e.id_evento, t.fecha_inicio FROM Tour as t, Artista as a, Eventos as e WHERE a.id_artista = e.id_artista AND a.nombre_escenico = '$nombre' AND e.id_tour = t.id_tour) as f WHERE f.fecha_inicio = MAX(f.fecha_inicio)) as ultimo_evento WHERE ultimo_evento;";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Tipo</th>
    </tr>
  <?php
	foreach ($artistas as $artista) {
  		echo "<tr> <td>$pokemon[0]</td> <td>$pokemon[1]</td> <td>$pokemon[2]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
