<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
  $fecha_consultar = $_GET['fecha'];
} else {
  date_default_timezone_set('US/Central');
  $fecha_consultar = date("d-m-Y");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Tiempo Maya</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Web que difunde conocimientos sobre la cultura Maya, como sus calendarios, el conteo del tiempo, los Nahuales y las energías. Su objetivo es despertar interés en la cultura Maya y facilitar la interacción con el usuario, sirviendo como canal de comunicación y construcción del conocimiento para quienes estén interesados.">
  <meta name="keywords" content="Cholqij, Habb, Rueda Calendárica, Nahual, energias, kines, uniales, nahuales, tiempo, maya, tzolkin, cuenta larga">
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <meta property="og:image" content="http://localhost/tiempo-maya/img/tiempo-maya.png">
  <meta property="og:title" content="Tiempo Maya">
  <meta property="og:description" content="Web que difunde conocimientos sobre la cultura Maya, como sus calendarios, el conteo del tiempo, los Nahuales y las energías. Su objetivo es despertar interés en la cultura Maya y facilitar la interacción con el usuario, sirviendo como canal de comunicación y construcción del conocimiento para quienes estén interesados.">
  <meta property="og:url" content="https://tiempomaya.com/">
  <meta property="og:site_name" content="Tiempo Maya">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_GT">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon.ico">
  <?php include "blocks/bloquesCss.html" ?>

  <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

  <?php include "NavBar.php" ?>

  <div>

  <section id="inicio" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <div id="inicioContainer" class="inicio-container" style="text-align: center;">
    <h1><br><br>Bienvenido al Tiempo Maya</h1>
    <div id='texto' style="padding: 15px; width: auto; max-width: 800px; margin: 0 auto;">
      <p style="color: whitesmoke; text-align: center; font-size: 1.2rem;">
        Aquí podrás explorar los diversos calendarios mayas, entender cómo contaban el tiempo, aprender sobre los nahuales y las energías que los mayas consideraban importantes.
      </p>
    </div>
    <div id='formulario' style="padding: 15px; width: auto;">
      <h5 style="color: whitesmoke;">Calendario Haab : <?php echo isset($haab) ? $haab : ''; ?></h5>
      <h5 style="color: whitesmoke;">Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
      <h5 style="color: whitesmoke;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
      <label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
    </div>
  </div>
</section>

  </div>

  <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>