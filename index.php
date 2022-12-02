<?php
require_once "./__init__.php";

// Hay que obtener los pokemones a elegir
#$query = $DB1->query('SELECT *, name FROM compania;');
#$pokemones = $query->fetchAll();
?>

<?php include('./templates/header.html'); ?>

<section class="hero is-success is-halfheight pokebaner">
  <div class="hero-body">
    <h1 class="title">Artistas y Productores</h1>
  </div>
</section>




<section class="section">
  <?php if (isset($_SESSION['username'])) { ?>
    <!-- Se muestra un mensaje si hay una sesión de usuario -->
    <?php if ($_SESSION['tipo']=='productora') { ?>
      <?php header("Location: " . './inicio_productora.php');?>

    <?php } elseif ($_SESSION['tipo']=='artista') { ?>
      <?php header("Location: " . './inicio_artista.php');?>

  <?php }} else { ?>
    <!-- En el caso que no, se muestran los botones para iniciar sesión -->


  <section class="section" >
    <div>
      <form class="buttons" action="consultas/importar_datos.php">
      <button class="button" style= "background-color: #066173" type="submit" name="Importar">Importar datos</button>
      </form>
  </div>
  </section>
  
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

<br>
          <button class="button" type="submit" name="login">Login</button>

        </form>
      </div>
    </div>
  </section>


  <?php } ?>
</section>

<!-- https://bulma.io/documentation/layout/tiles/ -->
<!-- Aquí agregamos una parte que solo está disponible a los usuarios con sesión iniciada -->
  
  
</main>

<?php include('./templates/footer.html'); ?>
