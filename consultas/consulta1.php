<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT nombre_escenico,telefono FROM Artista);";
	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      
      <th>Nombre</th>
      <th>Telefono</th>
  
    </tr>
  <?php
	foreach ($artistas as $artista) {
  		echo "<tr><td>$artista[0]</td><td>$artista[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
