<?php
require_once "./__init__.php";
?>

<?php include('./templates/header.html'); ?>


<?php
  require("./config/conexion.php");

  $nombre_productora = $_SESSION['username'];

  $query = "SELECT nombre_productora
  FROM productora
  WHERE nombre_productora = '$nombre_productora'";
  $result = $db -> prepare($query);
  $result -> execute();
  $data = $result -> fetchAll();

  foreach ($data as $v) {
    $nombre_productora = $v[0];
}
  ?>

<h2 class="title is-1"> Bienvenida productora <?php echo $nombre_productora ?>
</h2>

<body>
<?php
  require("./config/conexion.php");
  $query_programados = "SELECT e.id_evento, e.nombre_lugar, e.id_ciudad, e.fecha, p.nombre_productora, e.id_tour, e.id_artista
  FROM eventos as e, productora as p
  WHERE e.estado = 'programados' AND p.nombre_productora = '$nombre_productora' AND e.id_productora = p.id_productora
  ORDER BY e.fecha";
  $result_rechazados = $db -> prepare($query_rechazados);
  $result_rechazados -> execute();
  $data_rechazados = $result_rechazados -> fetchAll();

  $query_aprobados = "SELECT e.id_evento, e.nombre_lugar, e.id_ciudad, e.fecha, p.nombre_productora, e.id_tour, e.id_artista
  FROM eventos as e, productora as p
  WHERE e.estado = 'aceptado' AND p.nombre_productora = '$nombre_productora' AND e.id_productora = p.id_productora
  ORDER BY e.fecha";
  $result_aprobados = $db -> prepare($query_aprobados);
  $result_aprobados -> execute();
  $data_aprobados = $result_aprobados -> fetchAll();


  $query_rechazados = "SELECT e.id_evento, e.nombre_lugar, e.id_ciudad, e.fecha, p.nombre_productora, e.id_tour, e.id_artista
  FROM eventos as e, productora as p
  WHERE e.estado = 'rechazado' AND p.nombre_productora = '$nombre_productora' AND e.id_productora = p.id_productora
  ORDER BY e.fecha";
  $result_rechazados = $db -> prepare($query_rechazados);
  $result_rechazados -> execute();
  $data_rechazados = $result_rechazados -> fetchAll();

  $query_pendientes = "SELECT e.id_evento, e.nombre_lugar, e.id_ciudad, e.fecha, p.nombre_productora, e.id_tour, e.id_artista
  FROM eventos as e, productora as p
  WHERE e.estado = 'pendiente' AND p.nombre_productora = '$nombre_productora' AND e.id_productora = p.id_productora
  ORDER BY e.fecha";
  $result_rechazados = $db -> prepare($query_rechazados);
  $result_rechazados -> execute();
  $data_rechazados = $result_rechazados -> fetchAll();

  ?>



<form class="buttons" action="logout.php" method= 'post'>
  <input class="button is-primary" type="submit" value="Cerrar Sesión" >
</form>
<form align="center" action="./index.php" method= 'post'>
  <input class="button" type="submit" value="Volver" style = "height: 35px; font-size: 15px" >
</form>

<?php include('./templates/footer.html'); ?>