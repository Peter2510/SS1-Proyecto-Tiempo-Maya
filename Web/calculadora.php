<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);
$imagenNahual = include 'backend/buscar/conseguir_imagen_nahual.php';
$infoUinal = include 'backend/buscar/conseguir_info_uinal.php';



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
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

        <div id="inicioContainer" class="inicio-container">

            <?php echo "<h1>" . $pagina . " </h1>";
            ?>
            <img class="imagenElemento3" alt="" src="../img/logonew3.png">
            <br>
            <br>
            <br>
            <h1>Calculadora</h1>
            <div id='texto' style="padding: 12px; width: auto; max-width: 800px; margin: 0 auto;">

                <div id='formulario' style="padding: 15px; width: auto;">
                    <p style="color: whitesmoke; text-align: center; font-size: 1.4rem; margin:0">
                        Con la calculadora, puedes convertir una fecha del calendario Gregoriano a su equivalente en los calendarios Haab, Cholqu'ij y Cuenta Larga.
                    </p>

                    <p class="mt-3" style="color: whitesmoke; text-align: center; font-size: 1.2rem; margin:0">
                        Desliza hacia abajo para explorar más sobre el tiempo maya.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <div class="container-fluid">
        <section id="formulario" class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <h3 class="text-light mt-3">Calculadora</h3>
                <form action="#" method="GET">
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
                    <button type="submit" class="btn calc btn-lg mb-3"><i class="far fa-clock"></i> Calcular</button>
                </form>
            </div>

            <div id="calendar">

                <div class="col-md-8">
                    <div class="calendar-section">
                        <h3 class="text-light fw-bold">Calendario Haab</h3>
                        <div class="info">
                            <p class="text-light text-center fs-4"><?php echo isset($haab) ? $haab : ''; ?></p>
                        </div>
                        <div class="image">
                            <img class="me-3 mb-3" src="<?php echo $infoUinal[0]['imagen'] ?>" alt="Imagen Haab">
                            <img class="mb-3" src="<?php echo $infoUinal[0]['imagenDia'] ?>" alt="Imagen Maya">
                            <div class="text-light">
                                <h5 class="mt-2 mb-2 text-light fw-bold text-start">Significado</h5>
                                <p class="mt-2 mb-2"><?php echo $infoUinal[0]['significado'] ?></p>
                                <?php echo $infoUinal[0]['htmlCodigo'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-section">
                        <h3 class="text-light fw-bold">Calendario Cholquij</h3>
                        <div class="info">
                            <p class="text-light"><?php echo isset($cholquij) ? $cholquij : ''; ?></p>
                        </div>
                        <div class="image">
                            <img src="<?php echo $imagenNahual ?>" alt="Imagen Larga">
                        </div>
                    </div>

                    <div class="calendar-section">
                        <h3 class="text-light fw-bold">Calendario Larga</h3>
                        <div class="info">
                            <p class="text-light"><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></p>
                        </div>
                        <div class="image">
                            <img src="ruta_a_la_imagen_larga.png" alt="Imagen Larga">
                        </div>
                    </div>

                    <div class="calendar-section">
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
                </div>
        </section>

    

    <div class="text-center">
        <button id="btnDescargar" class="btn btn-primary mt-3">Descargar Imagen</button>
    </div>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>