<?php
require_once './../__init__.php';



$query1 = "SELECT * FROM crear_tabla()";
$result1 = $db -> prepare($query1);
$result1 -> execute();
$informacion = $result1 -> fetchAll();

$query2 = "SELECT * FROM importar_datos_productora()";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$info_prov = $result2 -> fetchAll();

$query3 = "SELECT * FROM importar_datos_artista()";
$result3 = $db -> prepare($query3);
$result3 -> execute();
$info_prov3 = $result3 -> fetchAll();

$query4 = "SELECT * FROM usuarios";
$result4 = $db -> prepare($query4);
$result4 -> execute();
$info_prov4 = $result4 -> fetchAll();
?>




<?php include './../templates/header.html' ?>

<div class="resultado">
    <h1 align="center" class ="titulo"> Informacion de usuarios</h1>
  </div>
  <div class="table is-striped">
    <table align="center">
      <tr>
        <th > ID</th>
        <th > Username</th>
        <th > Contraseña</th>
        <th > Tipo</th>
      </tr>
    <?php 
  
    foreach ($info_prov3 as $v) {
        echo "<tr><td>$v[0]</td><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td><td>";
    }
      
    ?>
    </table>
  </div>

  <br/><br/>

  <form align="center" action="../logout.php" method= 'post'>
    <input class="button is-primary" type="submit" value="Volver" >
  </form>


  <br/><br/>

<?php include './../templates/footer.html' ?>