<?php
require_once "./__init__.php";
?>

<?php include('./templates/header.html'); ?>


<?php
  require("./config/conexion.php");

  $nombre_artista = $_SESSION['username'];

  $query = "SELECT nombre_artista
  FROM artistas
  WHERE nombre_artista = '$nombre_artista'";
  $result = $db -> prepare($query);
  $result -> execute();
  $data = $result -> fetchAll();

  foreach ($data as $v) {
    $nombre_artista = $v[0];
}
  ?>

<h2 class="title is-1"> Bienvenido artista <?php echo $nombre_artista ?>
</h2>