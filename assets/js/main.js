
    // Este script se encargará de ocultar el preloader
    // Asegúrate de que el preloader se muestre durante al menos 2 segundos
document.addEventListener('DOMContentLoaded', function() {
    var minDisplayTime = 2000; // Tiempo mínimo en milisegundos
    var fadeOutDuration = 1000; // Duración del fade out en milisegundos
    var preloader = document.getElementById('preloader');
    var startTime = Date.now();

    window.addEventListener('load', function() {
        var elapsedTime = Date.now() - startTime;
        var timeRemaining = minDisplayTime - elapsedTime;
        timeRemaining = timeRemaining > 0 ? timeRemaining : 0;

        setTimeout(function() {
            preloader.style.opacity = '0'; // Inicia el fade out

            // Espera a que termine la transición de opacidad para ocultar el preloader
            setTimeout(function() {
                preloader.style.display = 'none';
            }, fadeOutDuration);
        }, timeRemaining);
    });
});
