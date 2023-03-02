<?php


include("menu.php");

echo '





';
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="es-es">
<title></title>
<link rel="stylesheet" type="text/css" href="css/Style.css" media="screen" />
<script type="text/javascript" src="js/java.js"></script>

<script type="text/javascript">
   function loadDoc() {
	
}

   /*-----------------------------------------------------*/

   var j=0;
   function deleteInput(letra,id)
  {
  	if(letra==j)
  	{ 
  		imagen = document.getElementById("file_"+id+'');
  		link = document.getElementById("a_"+id+'');		
  		j--;
  	}
  	else{
  		imagen = document.getElementById("input_"+id+'');
  		link = document.getElementById("a_"+id+'');		
  		c--;
  	}
  	
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
		padre_a = link.parentNode;
		padre_a.removeChild(link);
	}
	
  }
   /*-----------------------------------------------------*/

  function newImg(elem)
  {
    var inpt = document.createElement('input');
    inpt.type="file";
    inpt.name="file_"+j;
    inpt.id="file_"+j;
   
    document.getElementById(elem).appendChild(inpt);
    document.getElementById(elem).innerHTML+="<a id=a_"+j+" href='javascript:deleteInput(j,"+j+")'>[-]<br/></a>"; 
    j+=1;
  }
   /*-----------------------------------------------------*/
 var c=0;
  
  function newInput()
  {
    var inpt = document.createElement('input');
    inpt.type="text";
    inpt.name="input_"+c;
    inpt.id="input_"+c;
   
    document.getElementById('cajas').appendChild(inpt);
    document.getElementById('cajas').innerHTML+="<a id=a_"+c+" href='javascript:deleteInput(c,"+c+")'>[-]<br/></a>"; 
     c+=1;
  }
  /*-----------------------------------------------------*/
function visible(div){
if(div=="QUIRURGICO")
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
<body onload="cambia('diagnosticos')">


<div id="pdf" style="position:absolute;  left:600; display:none; "></div>






<!--/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*********************************************************************/-->
<div style="background:rgba(151,18,158,1); height:50px;">
	<div style="position:absolute; left:20px;">
<form>
	<h3><font color="white"> TIPO DE ESTDIO: </font></h3>
		<select onchange="visible(this.options[this.selectedIndex].text);" class="button_2">
			<option value="-1">Seleccione una opcion</option>
			<option value="1">QUIRURGICO</option>
			<option value="2">PAPANICOLAO</option>
		</select>
	<?php


include("Conexion.php");
$Objeto = new Conecto();
$Objeto->m_establece(true);
$Objeto->m_consulta("select id,nombre from paciente");
$Objeto->m_tamañoRegistro();


$Objeto2 = new Conecto();
$Objeto2->m_establece(true);
$Objeto2->m_consulta("select id,nombre from doctor");
$Objeto2->m_tamañoRegistro();

$Objeto->m_establece(false);
$Objeto2->m_establece(false);

if($Objeto->a_numeRegistro>0)
{	
echo '<select class="button_2">
		<option value="-1">Seleccione un paciente</option>';
	for ($i=0; $i < $Objeto->a_numeRegistro ; $i++) { 
	
			$tupla = $Objeto->m_traeRegistro();

			echo '
			<option value="'.$tupla->id.'">'.$tupla->nombre.'</option>';
		}

echo '</select>';
	
}


if($Objeto2->a_numeRegistro>0)
{	
echo '<select class="button_2">
		<option value="-1">Seleccione un doctor</option>';
	for ($i=0; $i < $Objeto2->a_numeRegistro ; $i++) { 
	
			$tupla = $Objeto2->m_traeRegistro();

			echo '
			<option value="'.$tupla->id.'">'.$tupla->nombre.'</option>';
		}

echo '</select>';
	
}


?>
 </form>
	
</div>

		<div align='center'>
			<img src="img/logosinfondo.png" alt="Logo" width="25%">
		</div>


<br><br>
<!--/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*********************************************************************/-->
<div class="divPrincipal" id="1" style="display:none;">
<div>
	<form action="" method="get" accept-charset="utf-8">
	 <input id="Mat" name="Mat" type="hidden" />
		  <img src="img/pdf/macro.png" alt="Descipcion macroscopica" width="45%"></br>
		   <textarea name="macro" rows="5" cols="60"></textarea>
	<a href="javascript:newImg('imgMacro')" >[+]Imagen</a>
	<div id="imgMacro">
	
	</div>
		  <img src="img/pdf/micro.png" alt="Descipcion microscopica" width="45%"></br>
		  	<textarea name="micro" rows="5" cols="60"></textarea>
	<a href="javascript:newImg('imgMicro')" >[+]Imagen</a>
	<div id="imgMicro">
	
	</div>
		  <img src="img/pdf/diag.png" alt="Diagnostico" width="23%"></br>
	        <textarea name="diag" rows="5" cols="60"></textarea>

	        <br><br>
	        <div align="center">
		        <input type="submit" name="estudioButton" value="Guardar" class="button_editor">
		        <input type="button" name="vistaButton" value="Vista Previa" class="button_editor" onclick="loadDoc()">
	        </div>
	</form>
</div>
</div>

<!--/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*********************************************************************/-->

<div class="divPrincipal" id="2" style="display:none;">
<div>
	<form action="" method="get" accept-charset="utf-8" name="f1">

		  <img src="img/pdf/valo.png" alt="Valoracion del material" width="45%">
		   <textarea name="valo" rows="2" cols="30"></textarea>

		  <img src="img/pdf/micro.png" alt="Descipcion microscopica" width="45%"></br>
		  	
		  	<a href="javascript:newInput()" >[+]</a>
			<div id='cajas'>
			</div>
		  <img src="img/pdf/sis.png" alt="Sistema Bethesda (2001): Anormalidades de celulas epiteliales" width="80%"></br>
	        <input type="checkbox" name="sis" value="1">Celulas escamosas atipicas de significado indeterminado (ASCUS)<br>
	        <input type="checkbox" name="sis" value="2">Lesion escamosa intraepitelial de bajo grado: VPH, Displasia leve (NIC1)<br>
	        <input type="checkbox" name="sis" value="3">Lesion escamosa intraepitelial de alto grado: Displasia moderada (NIC2)<br>
	        <input type="checkbox" name="sis" value="4">Displasia severa (NIC3), Carcinoma In Situ asociado o no a VPH<br>
	        <input type="checkbox" name="sis" value="5">Carcinoma de celualas escamosas<br>
	        <input type="checkbox" name="sis" value="6">Celulas glandulares atipicas de significado indeterminado (AGUS)<br>
	        <input type="checkbox" name="sis" value="7">Adenocarcinoma endocervical<br>
	        <input type="checkbox" name="sis" value="8">otras celulas malignas<br>

	      <img src="img/pdf/eva.png" alt="Evaluacion hormonal" width="45%"></br>
	        <textarea name="eva" rows="2" cols="60"></textarea>

		  <img src="img/pdf/diag.png" alt="Diagnostico" width="23%"></br>
	        <textarea name="diag" rows="5" cols="60"></textarea>

	        <br><br>
	        <div align="center">
		        <input type="submit" name="estudioButton" value="Guardar" class="button_editor">
		        <input type="submit" name="vistaButton" value="Vista Previa" class="button_editor">
	        </div>
	</form>
</div>
</div>

</body>
</html>