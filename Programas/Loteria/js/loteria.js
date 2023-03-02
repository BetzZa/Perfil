$(document).ready(
	function(){
		console.log("Hola desde jquery");
		//alert("Hola desde jquery");
           var accion=true;
           var numCartas=0;
            var contadorClicks = 0;
           var imagenes=new Array(
              'img/1.png',
              'img/2.png',
              'img/3.png',
              'img/4.png',
              'img/5.png',
              'img/6.png',
              'img/7.png',
              'img/8.png',
              'img/9.png',
              'img/10.png',
              'img/11.png',
              'img/12.png',
              'img/13.png',
              'img/14.png',
              'img/15.png'
            );

            var ocupados=new Array();

             function rotarImagenes()
                {
                   if(accion){
                    if(numCartas<15){
                    // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
                    var index=Math.floor((Math.random()*imagenes.length));

                     if(ocupados[index]== null)
                     {
                       // cambiamos la imagen
                       document.getElementById("demo").src=imagenes[index];
                       ocupados[index]=index;
                       numCartas++;
                       //console.log(numCartas);
                       return null;
                     }
                     else
                      // Cargamos una imagen aleatoria
                      rotarImagenes();
                    }
                    else
                      mensaje();
                  }

                }
                 /**
                * Función que se ejecuta una vez cargada la página
                */
                onload=function()
                {
                    // Indicamos que cada 5 segundos cambie la imagen
                    setInterval(rotarImagenes,5000);
                }
             

                function mensaje()
                {
                        /*DIALOG PARA LAS OPCIONES DE LA TABLA*/
                 var dialog_c = document.querySelector('#dialog');
                 dialog_c.showModal();
                 accion=false;
                 
                }

                function mensaje2()
                {
                        /*DIALOG PARA LAS OPCIONES DE LA TABLA*/
                 var dialog_c = document.querySelector('#dialog2');
                 dialog_c.showModal();
                 accion=false;
                 
                }
             
                   
                $("[name='carta']").click(
                  function(){

                    console.log(ocupados); 
                    console.log(this.alt);     
                         
                         var volteadas = $("[src='img/loteria.png']");

                         console.log(volteadas);

                        if(ocupados[parseInt(this.alt)]!=null){
                        //$(this).width("20px");
                        //$(this).hide("slow");
                        //$(this).show("fast");
                       contadorClicks++;
                       if (volteadas.length == 8) { 
                        mensaje2();
                       }
                        $(this).attr('src','img/loteria.png');
                      }

                  }
                );

                

                 $("#btn-reiniciar").click(
                   
                   function(){
                        $("img").show("fast");
                   onload();
                   }
                  );

	}
);