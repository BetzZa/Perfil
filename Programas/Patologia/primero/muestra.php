<?php

include("conexion.php");
		$Objeto = new Conecto();
	     $Objeto->m_establece(true);


	
session_start();
//include("Frame.php");

$p_actualizar =true;
if($_SESSION['tipo']=='Admin')
{
	if(isset($_GET['columna']) && isset($_GET['opcion']) ){
		if($_GET['columna']!=""  && $_GET['opcion']!=""){
		$tabla=$_GET['tabla'];
		$columna=$_GET['columna'];
		$opcion=$_GET['opcion'];
		$SQL="select * from ".$tabla." where ".$columna." like '%".$opcion."%'";
	  }else{
		$tabla=$_GET['tabla'];
		$SQL="select * from ".$tabla;
		}
	}else{
		$tabla=$_GET['tabla'];
		$SQL="select * from ".$tabla;
		}
	
}else
{
	$tabla=$_GET['tabla'];
	$SQL="select * from ".$tabla." where autor in (select nombre from usuario where correo='".$_SESSION['correo']."')";
	
}



	 	$a_bloque=mysql_query($SQL);
	  	$columnas=mysql_num_fields($a_bloque);
	    $rows=mysql_num_rows($a_bloque);
	  $left=0;
	  $top=0;
	  $cambia_renglon=0;
for ($i=0; $i < $rows; $i++,$left+=300,$cambia_renglon++) { 
		
		if($cambia_renglon>2)
		{
			$top+=200;
			$cambia_renglon=0;
			 $left=0;

		}
	$Tupla=mysql_fetch_array($a_bloque);

echo '<div style="left:'.$left.'px; top:'.$top.'px; position:absolute; ">';
/*echo '<div style="left:5px; top:5px; position:relative; width:70px; height:50px;">';
	
						
							echo " <a href='borrar.php?&tabla=".$tabla."&nomPK=Id&Id=".$Tupla['Id']."' title='borrar tema'/>
							  <img width=45% src='img/editor/icon_delete.ico'/></a>";
							if($p_actualizar)
							{
								if($tabla=='doctor')
								echo " <a href='area_edicion_trabajo.php?&tabla=".$tabla."&nomPK=Id&Id=".$Tupla['Id']."' title='Actualizar tema'/>
							    <img width=45% src='img/editor/icon_update.ico'/></a>";
							    if($tabla=='asesoria')
							    echo " <a href='actualiza_asesoria.php?&tabla=".$tabla."&nomPK=Id&Id=".$Tupla['Id']."' title='Actualizar asesoria'/>
							    <img width=45% src='img/editor/icon_update.ico'/></a>";
							     if($tabla=='usuario')
							    echo " <a href='actualiza_usuario.php?&Id=".$Tupla['Id']."' title='Actualizar usuario'/>
							    <img width=45% src='img/editor/icon_update.ico'/></a>";
							}

	echo '</div>';*/

echo '<div class="div_muestra" style="left:5px; top:45px; position:absolute; width:260px;">';

for ($j=0; $j <$columnas; $j++) { 
	$nombre=mysql_field_name($a_bloque,$j);

	if($nombre=='ruta_foto')
		echo "<img src='".$Tupla[$j]."' width='20%'/>";
	else
		if($nombre!='Id')
	 echo "<label><b>".$nombre."</b></label>: ".utf8_decode($Tupla[$j]);
	 echo "</br>";
    

}

 echo '</div>';
 echo "</div>";


}
$Objeto->m_establece(false);


?>
