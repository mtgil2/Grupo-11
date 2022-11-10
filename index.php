<?php include('templates/header.html');   ?>

<body>
  <h1 align="center"> Grupo 11</h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre Artista.</p>

  <br>

  <h3 align="center"> ¿Quieres ver todos los artistas y sus telefonos?</h3>

  <form align="center" action="consultas/consulta1.php" method="post"> 
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar numero de entradas de cortesia de un artista?</h3>

  <?php require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_escenico FROM Artista ORDER BY nombre_escenico ASC;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta2.php" method="post">
    Seleccione a un Artista:
    <select name="nombre">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo '<option value="'.$d[0].'">'.$d[0].'</option>';
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres los datos del ultimo tour?</h3>

  <?php require("config/conexion.php");
  $result = $db -> prepare("SELECT tour.nombre_tour FROM Artista, Tour, Eventos WHERE Artista.nombre_escenico = '$nombre' AND Artista.id_tour = Tour.id_tour AND Tour.fecha_inicio = (SELECT MAX(fecha_inicio) FROM TOUR) ASC;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta3.php" method="post">
    Seleccione a un Artista:
    <select name="nombre">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo '<option value="'.$d[0].'">'.$d[0].'</option>';
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM pokemones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

<?php require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_escenico FROM Artista ORDER BY nombre_escenico ASC;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta2.php" method="post">
    Seleccione a un Artista:
    <select name="nombre">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo '<option value="'.$d[0].'">'.$d[0].'</option>';
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

<?php
#Primero obtenemos todos los tipos de pokemones
require("config/conexion.php");
$result = $db -> prepare("SELECT DISTINCT tipo FROM pokemones;");
$result -> execute();
$dataCollected = $result -> fetchAll();
?>

<?php require("config/conexion.php");
$result = $db -> prepare("SELECT DISTINCT nombre_escenico FROM Artista ORDER BY nombre_escenico ASC;");
$result -> execute();
$dataCollected = $result -> fetchAll();
?>

<form align="center" action="consultas/consulta2.php" method="post">
  Seleccione a un Artista:
  <select name="nombre">
    <?php
    #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
    foreach ($dataCollected as $d) {
      echo '<option value="'.$d[0].'">'.$d[0].'</option>';
    }
    ?>
  </select>
  <br><br>
  <input type="submit" value="Buscar">
</form>
<br>
<br>
<br>
<br>






<h3 align="center"> ¿Quieres ver al artista con mas entradas?</h3>

  <form align="center" action="consultas/consulta7.php" method="post"> 
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
</body>
</html>
