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
        <input name="codigo_vuelo" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">:</label>
        <input name="aerodromo_salida" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Aeródromo llegada:</label>
        <input name="aerodromo_llegada" type="text">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Fecha salida:</label>
        <input name="fecha_salida" type="date">       
      </div> 
      <div class="mb-3">
        <label class="form-label">Fecha llegada:</label>
        <input name="fecha_llegada" type="date">      
      </div> 
      <div class="mb-3">
        <label class="form-label">Código aeronave:</label>
        <input name="codigo_aeronave" type="text">      
      </div>
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>

<?php include '../templates/footer.html' ?>