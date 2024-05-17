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

    <style>
        .canvas-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 150%; /* Aspect ratio */
        }
        #imagenCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">

                <div id='formulario'>
                    <h3 class="text-light mt-3" >Calculadora</h3>
                    <form action="#" method="GET">
                        <div class="mb-3">
                            <label for="fecha" class="form-label text-light">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn calc btn-lg mb-3"><i class="far fa-clock"></i> Calcular</button>
                    </form>

                     <div id="tabla" class="table-responsive">
                        <table class="table table-dark table-striped custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">Calendario</th>
                                    <th scope="col" style="width: 60%;">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td><?php echo isset($haab) ? $haab : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td><?php echo isset($cholquij) ? $cholquij : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 



                    <!-- <section id="info">
                    <h2>Información</h2>
                    <p>Este es un ejemplo de información que se incluirá en la imagen.</p>
                    <ul>
                        <li>Dato 1</li>
                        <li>Dato 2</li>
                        <li>Dato 3</li>
                    </ul>
                </section> -->

                <!-- Botón de Descarga -->
                <button id="btnDescargar" class="btn btn-primary mt-3">Descargar Imagen</button>
            


                </div>

            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <!-- Script Personalizado -->
    <script>
        // Función para generar la imagen y descargarla
// Función para generar la imagen y descargarla
function descargarImagen() {
    // Capturar el elemento que contiene la información
    var elementoInfo = document.getElementById('tabla');

    // Convertir el elemento a una imagen en un canvas
    html2canvas(elementoInfo, { 
        allowTaint: true,
        useCORS: true
    }).then(function(canvas) {
        // Crear un canvas secundario para agregar el fondo
        var canvasConFondo = document.createElement('canvas');
        var ctxFondo = canvasConFondo.getContext('2d');

        // Establecer el tamaño del canvas secundario
        canvasConFondo.width = canvas.width;
        canvasConFondo.height = canvas.height;

        // Rellenar el fondo del canvas secundario con un color azul
        // ctxFondo.fillStyle = 'blue';
        //ctxFondo.fillRect(0, 0, canvasConFondo.width, canvasConFondo.height);

        // Dibujar la imagen original sobre el canvas secundario
        ctxFondo.drawImage(canvas, 0, 0);

        // Crear un enlace para descargar la imagen
        var enlace = document.createElement('a');
        enlace.href = canvasConFondo.toDataURL('image/png');

        var fechaInput = document.getElementById('fecha');

        // Obtener el valor de la fecha seleccionada
        var fechaSeleccionada = fechaInput.value;
        
        enlace.download = 'infografia-'+fechaSeleccionada+'.png';
        
        // Hacer clic en el enlace para iniciar la descarga
        enlace.click();
    });
}

// Escuchar el evento de clic en el botón de descargar
document.getElementById('btnDescargar').addEventListener('click', descargarImagen);

    </script>



    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>