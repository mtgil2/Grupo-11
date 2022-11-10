<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["nombre"];

 	$query = "SELECT COUNT id_entrada FROM Entrada, Artista WHERE Entrada.id_artista = Artista.id_artista AND LOWER(Artista.nombre_escenico) = LOWER('$nombre');";
  $result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Numero entradas</th>

      
    </tr>
  <?php
	foreach ($artistas as $artista) {
  		echo "<tr><td>$artista[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
