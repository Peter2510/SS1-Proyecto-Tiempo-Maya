document.addEventListener('DOMContentLoaded', () => {
    const videoSource = document.getElementById('videoSource');
    const videoBackground = document.getElementById('videoBackground');
    const currentHour = new Date().getHours();
    const twoHourSegments = Math.floor(currentHour / 2);
    let videoPath;

    switch (twoHourSegments) {
        case 0:
        case 1:
            videoPath = 'assets/fondoPantalla/madrugada.mp4'; // 0-1, 2-3 1
            break;
        case 2:
        case 3:
            videoPath = 'assets/fondoPantalla/amanecer.mp4'; // 4-5, 6-7 2
            break;
        case 4:
        case 5:
            videoPath = 'assets/fondoPantalla/mañana.mp4'; // 8-9, 10-11 3
            break;
        case 6:
        case 7:
            videoPath = 'assets/fondoPantalla/tarde.mp4'; // 12-13, 14-15
            break;
        case 8:
        case 9:
            videoPath = 'assets/fondoPantalla/tarde.mp4'; // 16-17, 18-19 4
            break;
        case 10:
        case 11:
            videoPath = 'assets/fondoPantalla/noche.mp4'; // 20-21, 22-23 5
            break;
        default:
            videoPath = 'assets/fondoPantalla/noche.mp4'; // Por si acaso
    }

    videoSource.src = videoPath;
    videoBackground.load(); // Recargar el video con la nueva fuente
    videoBackground.play(); // Iniciar la reproducción
    videoBackground.loop = true; // Repetir el video al finalizar
    videoBackground.playbackRate = 0.5;
});
