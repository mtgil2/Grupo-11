<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT nombre_escenico FROM(SELECT a.nombre_escenico, COUNT e.id entrada AS num_entradas
     FROM Entrada as e, Artista AS a WHERE a.nombre_escenico input AS a.id_artista =
     e.id artista GROUP BY a.id_artista as o) WHERE o.num_entradas = (MAX num_entradas);";
	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Numero entrada</th>
     
    </tr>
  <?php
	foreach ($artistas as $artista) {
  		echo "<tr><td>$artista[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
