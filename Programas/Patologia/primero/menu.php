<link rel="stylesheet" type="text/css" href="CSS/Style.css" media="screen" />

<script type="text/javascript">
	function recargar(pagina){
		
	parent.location.replace(pagina);

	}
</script>
<?php



echo '

<ul>
  <li "><a id="home"  href="home.php" ">INICIO</a></li>
  <li "><a id="altas" href="altas.php" ">ALTAS</a></li>
  <li "><a id="diagnosticos" href="trabajo.php">DIAGNOSTICOS</a></li>
  <ul style="float:right;list-style-type:none;">
  <li "><a href="cerrar.php">SALIR</a></li>
   </ul>
</ul>




';

?>