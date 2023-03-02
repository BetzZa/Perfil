<?php
session_start();


if($_SESSION['tipo']=='Admin')
if(isset($_GET['tabla']))
{
 $Tabla= $_GET['tabla'];
include("Conexion.php");
$Objeto = new Conecto();
$Objeto->m_establece(true);
echo "&nbsp&nbsp Columnas: <select id='columnas' class='button_2'>";
echo "<option value=-1 >Selecciona una columna</option>";

$Objeto->m_consulta("select * from ".$Tabla);
$Objeto->m_tamañoRegistro();
$columnas=mysql_num_fields($Objeto->a_bloque);
for ($i=0; $i<$columnas; $i++)
{ 
$nombre_columna= mysql_field_name($Objeto->a_bloque,$i);
   echo "<option value=".$nombre_columna." >".$nombre_columna."</option>";

}
echo "</select>"; 
echo '        <input Id="opcion" value="" type="text" class="text" "/>';
echo '        <input Id="buscar" value="Buscar" type="button" class="button_2" onclick="guarda()"/>';
$Objeto->m_establece(false);

}
?>