<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/java.js"></script>
</head>
<body onload="cambia('home')">
<?php


if(isset($_SESSION['id']) && isset($_SESSION['nombre']))
{
include("menu.php");
}else
header('Location:index.php');

?>
<div style="background:rgba(151,18,158,1); height:50px;">
  <div style="position:absolute; left:20px;">


  </div>
    <div align='center'>
      <img src="img/logosinfondo.png" alt="Logo" width="25%">
    </div>
</div>


<?php


if($_SESSION['tipo']=='Admin')
echo "
<div >
    <form>
INFORMACION SOBRE: <select id='seleccion' name='seleccion' onchange='traerSelect(this.options[this.selectedIndex].value)' class='button_2'>
<option value=-1 >Selecciona </option>
<option value='doctor'>Doctores</option>
<option value='paciente'>Pacientes</option>
<option value='estudio'>Estudios</option>
<option value='tipo'>Tipos de documentos</option>

</select>

<div id='div_select'></div>
 </form>

";
?>


<div id="tabla" style="position:relative;  left:80px; top:60px; display:none;"></div>





</body>
</html>

