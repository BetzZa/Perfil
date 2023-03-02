<?php
session_start();
if(isset($_SESSION['id']))
{
include("conexion.php");
$Objeto = new Conecto();
$Objeto->m_establece(true);
if(isset($_REQUEST['doctorButton']))
{
  	$sql = "INSERT INTO `doctor`(`id`, `nombre`, `usuario`, `pass`, `tipo`) 
  		    VALUES ('','".$_POST['nombre']."','".$_POST['usuario']."','".$_POST['pass']."','".$_POST['tip']."')";
	$Objeto->m_consulta($sql);
	$Objeto->m_establece(false);
			
		 header("Location:altas.php");
}

if(isset($_REQUEST['pacienButton']))
{
  	$sql = "INSERT INTO `paciente`(`id`, `nombre`, `sexo`, `edad`, `usuario`, `pass`) 
  			VALUES ('','".$_POST['nombre']."','".$_POST['sex']."','".$_POST['edad']."','".$_POST['usuario']."','".$_POST['pass']."')";
	$Objeto->m_consulta($sql);
	$Objeto->m_establece(false);
			
		 header("Location:altas.php");
}


}

?>
