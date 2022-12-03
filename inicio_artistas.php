<?php
require_once "./__init__.php";
?>

<?php include('./templates/header.html'); ?>


<?php
  require("./config/conexion.php");
  $id_artista = $_SESSION['user_id'];
  $query = "SELECT nombre_lugar, fecha_evento
  FROM eventos
  WHERE '$id_artista' = eventos.id_artista";
  $result = $db -> prepare($query);
  $result -> execute();
  $data = $result -> fetchAll();


  ?>
<?php echo '<h2 class="title is-1"> Bienvenido artista $nombre_escenico; $id_artista </h2>';

  


  $nombre_artista = $_SESSION['username'];

  $query = "SELECT nombre_lugar, fecha
  FROM eventos
  WHERE id_artista = $id_artista";
  $result = $db -> prepare($query);
  $result -> execute();
  $data2 = $result -> fetchAll();
  


  ?>
<table align="center" class='table table-light table-hover w-auto table-bordered border-success table-striped'>
            <thead class="table-success" style = "background-color: blue">
                <tr>
                <th>Nombre Lugar</th>
                <th>Fecha evento</th>

               
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $data1) {
                    echo "<tr>";
                    for ($i = 0; $i < 2; $i++) {
                        echo "<td>$data1[$i]</td> ";
                        echo "hola";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
<form class="buttons" action="logout.php" method= 'post'>
  <input class="button is-primary" type="submit" value="Cerrar Sesión" >
</form>
<form align="center" action="./index.php" method= 'post'>
  <input class="button" type="submit" value="Volver" style = "height: 35px; font-size: 15px" >
</form>

<?php include('./templates/footer.html'); ?>