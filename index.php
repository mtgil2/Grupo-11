<?php
require_once "./__init__.php";

// Hay que obtener los pokemones a elegir
#$query = $DB1->query('SELECT *, name FROM compania;');
#$pokemones = $query->fetchAll();
?>

<?php include('./templates/header.html'); ?>

<section class="hero is-success is-halfheight pokebaner">
  <div class="hero-body" style = "padding-left: 30px">
    <h1 class="title" style = "color: black">Artistas y Productores</h1>
  </div>
</section>


<br>

<img src="./styles/coldplay-1.jpg" alt="HTML5 Icon" style="width:700px;height:480px; margin-top: -90px; padding-right: 100px; padding-bottom: 40px" align = "right">

</br>

<section class="section">
  <?php if (isset($_SESSION['username'])) { ?>
    <!-- Se muestra un mensaje si hay una sesión de usuario -->
    <?php if ($_SESSION['tipo']=='productora') { ?>
      <?php header("Location: " . './inicio_productoras.php');?>

    <?php } elseif ($_SESSION['tipo']=='artista') { ?>
      <?php header("Location: " . './inicio_artistas.php');?>

  <?php }} else { ?>
    <!-- En el caso que no, se muestran los botones para iniciar sesión -->
   
<div style = "padding-left: 70px">
  <section class="section" >
    <div>
      <form class="buttons" action="queries/importar_usuarios.php">
      <button class="button" style= "background-color: #83c7d4" type="submit" name="Importar">Importar datos</button>
      </form>
  </div>
  </section>
 
  <br>
<br>
  <section class="section">

    <div class="columns is-mobile is-centered is-vcentered cover-all">
      <div class="column is-half">
        <!-- https://bulma.io/documentation/form/general/ -->
        <form method="POST" action="login.php">
          <div class="field">
            <label class="label">Nombre de usuario</label>
            <div class="control">
              <input class="input" type="text" name="username">
            </div>
            <br>
            
            <label class="label">Contraseña</label>
            <div class="control">
              <input class="input" type="password" name="password">
            </div>
          </div>
<br>

          <button class="button" style= "background-color: #83c7d4" type="submit" name="login">Login</button>

        </form>
      </div>
    </div>
  </section>
  </div>
  <br>
  <br>
  <?php } ?>
</section>
<div align = "center">
<form  action="inicio_artistas.php" method= 'post'>
  <input class="button" type="submit" value="Ver Pagina Artistas" style = "height: 35px; font-size: 15px" >
</form>
<form  action="inicio_productoras.php" method= 'post'>
  <input class="button" type="submit" value="Ver pagina Productoras" style = "height: 35px; font-size: 15px" >
</form>
  </div>
<!-- https://bulma.io/documentation/layout/tiles/ -->
<!-- Aquí agregamos una parte que solo está disponible a los usuarios con sesión iniciada -->
  
  
</main>

<?php include('./templates/footer.html'); ?>
