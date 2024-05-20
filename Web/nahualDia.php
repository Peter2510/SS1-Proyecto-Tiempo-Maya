<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$infoNahual = include 'backend/buscar/conseguir_info_nahual.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tiempo Maya - Nahual</title>
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
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

    <?php include "NavBar.php" ?>

    <section id="inicio">
    <video autoplay muted loop id="videoBackground">
        <source id="videoSource" src="" type="video/mp4">
        Tu navegador no soporta la etiqueta de video.
      </video>
        <div id="inicioContainer" class="inicio-container">

            <br>
            <br>
            <br>
            <h1>Nahual del día</h1>
            
            <div id='texto' style="padding: 12px; width: auto; max-width: 800px; margin: 0 auto;">

                <img class="imagenElemento2" alt="" src="img/flecha.png">
            </div>
        </div>
    </section>

    <div id="body-calc" class="container-fluid text-center">
        <section id="calendar" class="row justify-content-center align-items-center" style="padding: 15px; width: auto;">
            <div class="col-md-8">
                <h3 class="text-light mt-3">Calculadora</h3>
                <form action="#body-calc" method="GET">
                    <div class="mb-3">
                        <label for="fecha" class="form-label text-light">Fecha</label>
                        <?php
                        // Verificar si se ha enviado una fecha
                        if (isset($_GET['fecha']) && !empty($_GET['fecha'])) {
                            // Si se ha enviado una fecha, usarla como valor del campo de entrada
                            $fecha = $_GET['fecha'];
                        } else {
                            // Si no se ha enviado ninguna fecha, establecer la fecha actual
                            $fecha = date('Y-m-d');
                        }
                        ?>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                    </div>
                    <button type="submit" class="btn calc btn-lg mb-3 mt-3"><i class="far fa-clock"></i> Calcular</button>
                </form>
            </div>
        </section>

        <section id="calendar" class="row justify-content-center align-items-center" style="padding: 15px; width: auto;">
            <div class="col-md-10" id="infografia">


                <div class="calendar-section mt-3">
                    <h3 class="text-light fw-bold">Nahual del día</h3>
                    <div class="info">
                        <p class="text-light text-center fs-4"><?php echo isset($nahual) ? $infoNahual[0]['nombre'] : ''; ?></p>
                    </div>
                    <div class="image">
                        <img class="me-3 mb-3" src="<?php echo $infoNahual[0]['imagenAnimal'] ?>" alt="Imagen Haab">
                        <div class="text-light">
                            <p class="fs-6">Nombre en Yucateco: <strong> <?php echo $infoNahual[0]['nombreYucateco']; ?></strong>  </p>
                            <h5 class="mt-2 mb-2 text-light fw-bold text-start">Significado</h5>
                            <p class="mt-2 mb-2"><?php echo $infoNahual[0]['significado'] ?></p>
                            <div class="text-start">
                            <?php echo $infoNahual[0]['htmlCodigo'] ?>
                            </div>
                        </div>
                        <h2 class="text-light">Cruz Maya</h2>
                        <img class="me-3 mb-3" src="<?php echo $infoNahual[0]['cruzMaya'] ?>" alt="Imagen Haab">
                    </div>
                </div>


                <div class="calendar-section mt-3">
                    <h3 class="text-light fw-bold">Calendario Gregoriano</h3>
                    <div class="info">
                        <p class="text-light text-center fs-4">
                            <?php
                            // Mostrar la fecha seleccionada o la fecha actual en el párrafo
                            $numero_mes = date('n', strtotime($fecha));
                            $mes = $numero_mes < 10 ? '0' . $numero_mes : $numero_mes;
                            $fecha_formateada = date('d/' . $mes . '/Y', strtotime($fecha));
                            echo $fecha_formateada;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <button id="btnDescargar" class="btn calc btn-lg mb-3">Descargar Imagen</button>
        </div>
        </section>
    </div>
    <?php include "blocks/bloquesJs1.html" ?>



</body>

</html>