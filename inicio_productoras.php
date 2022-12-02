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

<div class="resultado">
    <h1 align="center" name= "tablaconsulta2"> Vuelos aprobados</h1>
  </div>
  <div class="table is-striped">
  <table align="center">
    <tr>
        <th > ID vuelo</th>
        <th > Codigo Vuelo</th>
        <th > Codigo Aeronave</th>
        <th > ID Aerodromo Salida</th>
        <th > ID Aerodromo Llegada</th>
        <th > ID Ruta</th>
        <th > Fecha Salida</th>
        <th > Fecha Llegada</th>
        <th > Velocidad</th>
        <th > Altitud</th>
      </tr>
    <?php 
  
    foreach ($data_aprobados as $v) {
        echo "<tr><td>$v[0]</td><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td><td>$v[4]</td><td>$v[5]</td><td>$v[6]</td><td>$v[7]</td><td>$v[8]</td><td>$v[9]</td><td>";
    }
    ?>

  	</table>
  </div>


  <div class="resultado">
    <h1 align="center" name= "tablaconsulta2"> Vuelos rechazados</h1>
  </div>
  <div class="table is-striped">
  <table align="center" >
    <tr>
        <th > ID vuelo</th>
        <th > Codigo Vuelo</th>
        <th > Codigo Aeronave</th>
        <th > ID Aerodromo Salida</th>
        <th > ID Aerodromo Llegada</th>
        <th > ID Ruta</th>
        <th > Fecha Salida</th>
        <th > Fecha Llegada</th>
        <th > Velocidad</th>
        <th > Altitud</th>
      </tr>
    <?php 
  
    foreach ($data_rechazados as $v) {
        echo "<tr><td>$v[0]</td><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td><td>$v[4]</td><td>$v[5]</td><td>$v[6]</td><td>$v[7]</td><td>$v[8]</td><td>$v[9]</td><td>";
    }
    ?>

  	</table>
  </div>

<form class="buttons" action="logout.php" method= 'post'>
  <input class="button is-primary" type="submit" value="Cerrar Sesión" >
</form>


<?php include('./templates/footer.html'); ?>