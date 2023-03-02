function cambia(go){

document.getElementById(go).className = 'active';

}


function traerSelect(tabla) {
  document.getElementById("div_select").style.display="inline-block";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("div_select").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "informacion.php?tabla="+tabla, true);
  xhttp.send();
}

var tabla;
var columna;
var opcion;
function guarda(){

 tabla = document.getElementById("seleccion").value;
 columna = document.getElementById("columnas").value; 
 opcion = document.getElementById("opcion").value;
loadDoc();
}


function loadDoc() {

	document.getElementById("tabla").style.display="inline-block";
	
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("tabla").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "muestra.php?&tabla="+tabla+"&columna="+columna+"&opcion="+opcion, true);
  xhttp.send();
}
