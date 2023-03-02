<?php
session_start();
$usuario=$_POST['User'];
$pwd=$_POST['Pwd'];
include("Conexion.php");
$Objeto = new Conecto();

// paso 1 debemos haccer una conexion al servidor
$Objeto->m_establece(true);
$Objeto->m_consulta("select id,nombre,tipo from doctor where usuario = '".$usuario."' and pass ='".$pwd."';");
$Objeto->m_tamañoRegistro();
$Objeto->m_establece(false);

if($Objeto->a_numeRegistro==1)
{	
	$tupla = $Objeto->m_traeRegistro();
	$_SESSION['id']=$tupla->id;
	$_SESSION['nombre']=$tupla->nombre;
	$_SESSION['tipo']=$tupla->tipo;
	
	header('Location: home.php');
}
else
{
	
	?> <script>
	 alert("Usuario o contraseña incorrecta");
	location.replace('index.php');

</script>
<?php
}
?>