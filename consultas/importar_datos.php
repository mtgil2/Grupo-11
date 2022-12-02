<?php
require_once './../__init__.php';

?>

<?php include('../templates/header.html'); ?>

<div class="resultado">
  <br>
  </br>
  <br>
  </br>
  <h1 align="center" class ="titulo" style = "color: Black"> Se han importado los datos correctamente! </h1>
  <br>
  </br>

</div>    
    
<br>
</br>

<div class="columns is-mobile is-centered is-vcentered cover-all">
  <form class="buttons" action="ver_importacion.php">
    <button class="button" type="submit" name="Importar" style= "background-color: #83c7d4">Ver tabla con usuarios importados</button>
  </form>
</div> 
<br>
<br>
<form align="center" action="../index.php" method= 'post'>
  <input class="button is-primary" type="submit" value="Volver" >
</form>

<br>
</br>

<?php include('../templates/footer.html'); ?>
