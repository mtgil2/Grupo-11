<?php
    require("../config/conexion.php");
    include('../templates/header.html');
    session_start();
?>
<html>
  <head>
    <title>Nuevo Evento</title>
  </head>
  <body>
    <form action="propuesta_evento.php" method="post">
      <div class="mb-3">
        <label class="form-label">Nombre Lugar:</label>
        <input name="nombre_lugar" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Id Ciudad</label>
        <input name="id_cuidad" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Fecha</label>
        <input name="fecha" type="date">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Id Productora</label>
        <input name="id_productora" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Id tour:</label>
        <input name="id_tour" type="text">      
      </div> 
      <div class="mb-3">
        <label class="form-label">Id turista</label>
        <input name="id_turista" type="text">      
      </div>
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>

<?php include '../templates/footer.html' ?>