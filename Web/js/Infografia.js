// Función para generar la imagen y descargarla
function descargarImagen() {
    // Capturar el elemento que contiene la información
    var elementoInfo = document.getElementById('infografia');

    // Convertir el elemento a una imagen en un canvas
    html2canvas(elementoInfo, {
        allowTaint: true,
        useCORS: true
    }).then(function (canvas) {
        // Crear un canvas secundario para agregar el fondo
        var canvasConFondo = document.createElement('canvas');
        var ctxFondo = canvasConFondo.getContext('2d');

        // Establecer el tamaño del canvas secundario
        canvasConFondo.width = canvas.width;
        canvasConFondo.height = canvas.height;

        var imagenFondo = new Image();
        imagenFondo.src = 'assets/tik.jpg';

        imagenFondo.onload = function () {


            // Dibujar la imagen de fondo en el canvas secundario
            ctxFondo.drawImage(imagenFondo, 0, 0, canvasConFondo.width, canvasConFondo.height);

            // Dibujar la imagen original sobre el canvas secundario
            ctxFondo.drawImage(canvas, 0, 0);

            // Crear un enlace para descargar la imagen
            var enlace = document.createElement('a');
            enlace.href = canvasConFondo.toDataURL('image/png');

            var fechaInput = document.getElementById('fecha');

            // Obtener el valor de la fecha seleccionada
            var fechaSeleccionada = fechaInput.value;

            enlace.download = 'infografia-' + fechaSeleccionada + '.png';

            // Hacer clic en el enlace para iniciar la descarga
            enlace.click();
        };


    });
}

// Escuchar el evento de clic en el botón de descargar
document.getElementById('btnDescargar').addEventListener('click', descargarImagen);