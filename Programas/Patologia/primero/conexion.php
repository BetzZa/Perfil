<?php

class Conecto{
var $a_numeRegistro;
var $a_error;
var $a_bloque;
var $a_Conexion;
	//---------1
	function m_conecta($p_Servidor,$p_Usuario,$p_Pass,$p_bd){
		$this->a_Conexion = mysql_connect($p_Servidor,$p_Usuario,$p_Pass);
			if($this->a_Conexion)
			{
				if(mysql_select_db($p_bd,$this->a_Conexion))
				     $this->a_error="";
				else
				$this->a_error="Nombre de BD incorrecto";
			}
			else
			$this->a_error="No se realizo la conexion";
	}
		
	function m_establece($p_opcion=false)
	{
		if($p_opcion)
			$this->m_conecta("localhost","patologo","pat2016","patologia");
 		else
 			mysql_close($this->a_Conexion);

	}
	
	//---------2
	function m_consulta($p_consulta)
	{
		$this->a_bloque=mysql_query($p_consulta);
		return $this->a_bloque;
	}
	

	function m_tamañoRegistro()
	{
	  // Conocer cuantos registros
	  $this->a_numeRegistro=mysql_num_rows($this->a_bloque);

	}
	
	
	//---------3
	function m_erro()
	{
		if(mysql_error()>"")
			$this->a_error=mysql_error();
	  else
		$this->a_error="";
	}


		function m_muestraTabla($p_nombColumnas="",$p_border=0,$p_rengImpar=0,
		$p_borrar=false,$p_actualizar=false,$p_comprar=false,$p_tabla="",$p_nombLlavePrimaria="")
		{
			echo "<table border='".$p_border."'>";
			
			$this->a_bloque;
			$this->m_tamañoRegistro();
			$columnas=mysql_num_fields($this->a_bloque);
			if($p_nombColumnas=="")
			{	
			echo "<tr>";
				if($p_comprar)
					echo "<td>Comprar&nbsp;</td>";
				if($p_borrar)
					echo "<td>Eliminar&nbsp;</td>";
		
				if($p_actualizar)
					echo "<td>Actualizar&nbsp;</td>";

				for($c=0;$c<$columnas;$c++)
						echo "<td>".mysql_field_name($this->a_bloque,$c)."</td>";
			echo "</tr>";
			}
			
			$v_color="#ABC";
			
			for($r=0;$r<$this->a_numeRegistro;$r++)
			{
		    $Tupla=mysql_fetch_array($this->a_bloque);
		
			echo "<tr bgcolor='".(($p_rengImpar)?$v_color:"#FFF")."'>";
			
			if($p_comprar)
					echo "<td align='center' width=30>
						  <a href='comprar.php?&tabla=".$p_tabla."&nomPK=".$p_nombLlavePrimaria."&Id=".$Tupla[$p_nombLlavePrimaria]."' title='Comprar articulo'/>
						  <img  width=50% src='Iconos/plus.ico'/></td>";
			if($p_borrar)
					echo "<td align='center' width=30>
				          <a href='borrar.php?&tabla=".$p_tabla."&nomPK=".$p_nombLlavePrimaria."&Id=".$Tupla[$p_nombLlavePrimaria]."' title='Actualizar registro'/>
						  <img width=35% src='Iconos/icon_delete.ico'/></td>";
			if($p_actualizar)
					echo "<td align='center' width=30>
				          <a href='Actualizar.php?&tabla=".$p_tabla."&nomPK=".$p_nombLlavePrimaria."&Id=".$Tupla[$p_nombLlavePrimaria]."' title='Actualizar registro'/>
						  <img width=35% src='Iconos/icon_update.ico'/></td>";
				
			
			for($c=0;$c<$columnas;$c++)
				if(
			(strpos(strtoupper($Tupla[$c]),'JPG')!==false) || 
			(strpos(strtoupper($Tupla[$c]),'PNG')!==false) || 
			(strpos(strtoupper($Tupla[$c]),'GIF')!==false) || 
			(strpos(strtoupper($Tupla[$c]),'BMP')!==false))
					echo "<td><img src='fotos/".$Tupla[$c]."' width='30px' height='30px'/></td>";
				else
			echo "<td>".utf8_encode($Tupla[$c])."</td>";
			
			echo "</tr>";
			
			if($v_color=="#ABC")
				$v_color="#CBA";
			else
				$v_color="#ABC";
				
			}
	      echo "</table>";



		  }
		  
		  //metodo que regresa un registro del bloque obtenido
		  function m_traeRegistro()
		  {
			  return mysql_fetch_object($this->a_bloque);
		  }
		  
		  
		  
}

?>