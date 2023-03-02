<?php


include("menu.php");

echo '





';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/java.js"></script>
<script>
function visible(div){
if(div=="PACIENTE")
{
document.getElementById("2").style.display ='none';
document.getElementById("1").style.display ='inherit';


}else{
document.getElementById("1").style.display ='none';
document.getElementById("2").style.display ='inherit';


}


}


</script>
</head>
<body onload="cambia('altas')">
<div style="background:rgba(151,18,158,1); height:50px;">
	<div style="position:absolute; left:20px;">
	<form action="guarda.php" method="post" accept-charset="utf-8">
		<h3><font color="white"> REGISTRAR A: </font></h3>
		<select onchange="visible(this.options[this.selectedIndex].text);" class="button_2">
			<option value="-1">Seleccione una opcion</option>
			<option value="1">PACIENTE</option>
			<option value="2">DOCTOR</option>
		</select>
	</form>
	</div>
		<div align='center'>
			<img src="img/logosinfondo.png" alt="Logo" width="25%">
		</div>
</div>


<div style="display:none; " id="1" class="centrar trans">
		<form action="insertar.php" method="post">
		<h3>NOMBRE:<input type="text" name="nombre" value="" placeholder="Nombre" class="text"></h3>
		SEXO: <input type="radio" name="sex" value="M" checked > M
		      <input type="radio" name="sex" value="F" > F</br></br>
		EDAD: <input type="number" name="edad" value="" placeholder="Edad" min="1" max="150" class="text"></br></br>
		USUARIO: <input type="text" name="usuario" value="" placeholder="usuario" class="text"></br></br>
		CONTRASEÑA: <input type="password" name="pass" value="" placeholder="" class="text"></br>
		<input type="submit" name="pacienButton" value="Registrar" class="button">
	</form>
</div>

<div style="display:none;" id="2" class="centrar trans">
	<form action="insertar.php" method="post">
		<h3>NOMBRE: <input type="text" name="nombre" value="" placeholder="Nombre" class="text"></br></h3>
		USUARIO: <input type="text" name="usuario" value="" placeholder="usuario" class="text"></br></br>
		CONTRASEÑA: <input type="password" name="pass" value="" placeholder="" class="text"></br></br>
		<?php

		echo 'TIPO: <input type="radio" name="tip" value="M" checked > ADMINISTRADOR
		      <input type="radio" name="tip" value="F" > DOCTOR</br></br> ';

		?>
		<input type="submit" name="doctorButton" value="Registrar" class="button">
	</form>
</div>


</body>
</html>

