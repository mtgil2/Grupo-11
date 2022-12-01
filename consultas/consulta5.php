<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $id_nuevo = $_POST["id_elegido"];

 	$query = "SELECT DISTINCT p.id_productora, p.nombre_productora, p.telefono FROM artista as a, evento as e, productora as p WHERE a.nombre_escenico = 'nombre_dado' AND a.id_artista = e.id_artista AND e.id_productora = p.id_productora);";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Altura</th>
      <th>Peso</th>
      <th>Experiencia Base</th>
      <th>Tipo</th>
    </tr>
  <?php
	foreach ($pokemones as $pokemon) {
  		echo "<tr><td>$pokemon[0]</td><td>$pokemon[1]</td><td>$pokemon[2]</td><td>$pokemon[3]</td><td>$pokemon[4]</td><td>$pokemon[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
