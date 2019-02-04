document.oncontextmenu = function() {
   return false
}
function right(e) {
    var msg = "¡Por razones de Seguridad, hemos impedido el uso del boton derecho!, disculpe la molestia que le pueda ocasionar. Equipo de TecnicoaCR";
    if (navigator.appName == 'Netscape' && e.which == 3) {
        alert(msg); // Delete this line to disable but not alert user
        return false;
      }
      else
      if (navigator.appName == 'Microsoft Internet Explorer' && event.button == 2) {
          alert(msg); // Delete this line to disable but not alert user
            return false;
            }
            return true;
        }
        document.onmousedown = right;
