<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
$tabla = $_GET['elemento'];
$table = strtolower($tabla);
$datos = $conn->query("SELECT nombre,significado,htmlCodigo,imagen FROM tiempomaya." . $table . ";");
$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempomaya.pagina WHERE nombre='" . $tabla . "';");



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tiempo Maya - <?php echo $tabla; ?></title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Web que difunde conocimientos sobre la cultura Maya, como sus calendarios, el conteo del tiempo, los Nahuales y las energías. Su objetivo es despertar interés en la cultura Maya y facilitar la interacción con el usuario, sirviendo como canal de comunicación y construcción del conocimiento para quienes estén interesados.">
    <meta name="keywords" content="Cholqij, Habb, Rueda Calendárica, Nahual, energias, kines, uniales, nahuales, tiempo, maya, tzolkin, cuenta larga">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <meta property="og:image" content="http://localhost/tiempo-maya/img/tiempo-maya.png">
    <meta property="og:title" content="Tiempo Maya">
    <meta property="og:description" content="Web que difunde conocimientos sobre la cultura Maya, como sus calendarios, el conteo del tiempo, los Nahuales y las energías. Su objetivo es despertar interés en la cultura Maya y facilitar la interacción con el usuario, sirviendo como canal de comunicación y construcción del conocimiento para quienes estén interesados.">
    <meta property="og:url" content="https://tiempomaya.com/">
    <meta property="og:site_name" content="Tiempo Maya">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_GT">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon.ico">

    <?php include "../blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/simbolosCalendario.css?v=<?php echo(rand()); ?>" />


</head>
<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio">

    

    <video autoplay muted loop id="videoBackground">
        <source id="videoSource" src="" type="video/mp4">
        Tu navegador no soporta la etiqueta de video.
      </video>

        <div id="inicioContainer" class="inicio-container">
            <?php echo "<h1>" . $tabla . " </h1>";
            ?>
            <img class="imagenElemento3" alt="" src="../img/logonew3.png">
            <img class="imagenElemento2" alt="" src="../img/flecha.png">
        </div>
    </section>
    <br><br><br><br>
    <section id=" information">
            <div class="container">
                <div class="row about-container">
                    <div class="section-header">
                        <h3 class="section-title">INFORMACION</h3>
                    </div>
                    <?php foreach ($informacion as $info) {
                        echo $info['htmlCodigo'];
                    } ?>
                </div>

            </div>
            </div>
    </section>
    <hr>

    <section id="elementos">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title mb-5 mt-2">Elementos</h3>
                </div>
                <?php foreach ($datos as $dato) : ?>
                    <div class="col-12">
                        <h3 class="text-center" id='<?php echo htmlspecialchars($dato['nombre'], ENT_QUOTES, 'UTF-8'); ?>'><?php echo htmlspecialchars($dato['nombre'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <div class="text-center">
                                <img src="<?php echo htmlspecialchars($dato['imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($dato['nombre'], ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid custom-img-size">
                            </div>
                                                
                        <h5>Significado</h5>
                        <p><?php echo $dato['significado']; ?></p>
                        <p><?php echo $dato['htmlCodigo']; ?></p>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>



    <?php include "../blocks/bloquesJs.html" ?>




</body>

</html>