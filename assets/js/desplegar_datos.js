/* 
 * En este archivo estan las funciones para deplegar los archivos
 * a la pagina web, mediante ajax.
 * Author: TecnicoaCR-Team
 * Date: 03/02/2019-15:13
 */

/*
 * Esta función despliega los datos de la empresa
 * cuando el usuario presiona el botón en la seccion 
 * de empresa.
 */
function desplegar_datos_empresa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datos-empresa").innerHTML =
            this.responseText;
        }
    };
    xhttp.open("GET", "assets/empresa.php", true);
    xhttp.send();
}