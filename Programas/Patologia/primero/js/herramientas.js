function objeto(capa){

return document.getElementById(capa);

}





function valida_pass(){
if (objeto("pwd").value>"" && objeto("email").value>"") {


}

else
{

alert("Ninguno de los Campos puede quedar vacio");

}


}



function valida_reg(){
if (objeto("ingre").value>"" ) {


}

else
{

alert("Ninguno de los Campos puede quedar vacio");

}


}



function valida_act(){
if (objeto("ingre").value>"" ) {


}

else
{

alert("Ninguno de los Campos puede quedar vacio");

}


}



function val(){
if (objeto("act").value >"") {

		objeto("enviar").submit();
		return true;

}

else
{


alert("Ninguno de los Campos puede quedar vacio o selecciona una imagen");
return false;

}


}