<!--NUEVO CODIGO BORRAR-->
<div id="dataModal3" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles3">
    ¿ESTÁS SEGURO DE BORRAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes" class="btn confirm">SI BORRAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>

<div id="dataModalCLON" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detallesCLON">
    ¿ESTÁS SEGURO DE DUPLICAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes2" class="btn confirm">SI DUPLICAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>


<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>





<script type="text/javascript">

function genPass() {
    // define result variable 
    var Password = "";
    // define allowed characters
    var characters = "0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    // define length of password character
    var long = "8";
    for (var i = 0; i < long; i++) {
        // generate password
        gen = characters.charAt(Math.floor(Math.random() * characters.length));
        Password += gen;
    }
    // send the output to the input
    document.getElementById('contrasenia').value = Password;
}
// Copy password button




	$(document).ready(function(){



$(document).on('click', '.view_LP', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"listaproveedores/VistaPreviaLP.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajePORVENDEDOR').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
	$.getScript(load(1));
   }
  });
 })


$(document).on('click', '.view_BORRARLP', function(){

  var borra_LP = $(this).attr("id");
  var borra_listadoP = "borra_listadoP";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
  url:"listaproveedores/controladorLP.php",
   method:"POST",
   data:{borra_LP:borra_LP,borra_listadoP:borra_listadoP},
   
    beforeSend:function(){  
    $('#mensajeLISTADO').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeLISTADO").html("<span id='ACTUALIZADO' >"+data+"</span>");			
			//$("#reset_INCIDENCIAS").load(location.href + " #reset_INCIDENCIAS");
		$.getScript(load(1));			
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });



		
$("#enviarLISTADO").click(function(){

    var formulario = $("#LISTADOform").serializeArray();

    $.ajax({
        type: "POST",
        url: "listaproveedores/controladorLP.php",
        data: formulario,
    }).done(function(respuesta){
		$("#LISTADOform")[0].reset();

        if($.trim(respuesta) == 'Ingresado'){

            // Mostrar mensaje de éxito
            $("#mensajeLISTADO").html(respuesta);

            // Ocultar sección
            //$('#target9').hide("linear");

            // LIMPIAR FORMULARIO
            

            // Refrescar zona
            $("#reset").load(location.href + " #reset");     

            // DESAPARECER MENSAJE DESPUÉS DE 2 SEGUNDOS
            setTimeout(function(){
                $("#mensajeLISTADO").fadeOut(300, function(){
                    $(this).html('').show();
                });
            },2000);

        } else {

            // Mostrar error
            $("#mensajeLISTADO").html("<span id='ERROR'>"+respuesta+"</span>");

            $("#reset").load(location.href + " #reset");

        }

    });

});







$("#enviarLISTADOYENVIARCORREO").click(function(){
	
    var formulario = $("#LISTADOform").serializeArray();
    formulario.push(
        { name: "mandacorreo2", value: 'si' }
    );
	
    $.ajax({
        url: 'listaproveedores/controladorLP.php',
        method: "POST",
        data: formulario, 
        beforeSend: function(){  
            $('#mensajeLISTADO').html('cargando...'); 
        }, 	
        success: function(data){

            if($.trim(data) == 'Ingresado' || $.trim(data) == 'ACTUALIZADO'){

                $('#dataModal').modal('hide');

                // ✅ Limpia formulario
                $("#LISTADOform")[0].reset();

                // ✅ Refrescar listado
                $("#reset").load(location.href + " #reset");

                // ✅ Mostrar mensaje
                $("#mensajeLISTADO").html("<span id='ACTUALIZADO'>"+data+"</span>");

                // ✅ Ocultar mensaje en 2 seg
                setTimeout(function(){
                    $("#mensajeLISTADO").fadeOut(300, function(){
                        $(this).html('').show();
                    });
                },2000);

            }
            else if($.trim(data) == 'ACTUALIZADO Y CORREO ENVIADO'){

                // ✅ Limpia también
                $("#LISTADOform")[0].reset();

                $("#mensajeLISTADO").html("<span id='ACTUALIZADO'>"+data+"</span>");

                setTimeout(function(){
                    $("#mensajeLISTADO").fadeOut(300, function(){
                        $(this).html('').show();
                    });
                },2000);

            }
            else{

                // ❌ Error — no se limpia el form
                $("#mensajeLISTADO").html("<span id='ERROR'>"+data+"</span>");

            }

        }  
    });

});










$("#clickbuscar").click(function(){
const formData = new FormData($('#buscaform')[0]);

$.ajax({
    url: 'listaproveedores/fetch_pagesLP.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(data) {
				
	$("#results").load("listaproveedores/fetch_pagesLP.php");

})
.fail(function() {
    console.log("detect error");
});
});


//NOMBRE DEL BOTÓN
$(document).on('click', '.BORRAR', function(){
var BORRAR = 'BORRAR';
$.ajax({
url:'listaproveedores/fetch_pagesLP.php',
method:'POST',
data:{BORRAR:BORRAR},
beforeSend:function(){
$('#mensajeSUBIRFACTURA').html('cargando');
},
success:function(data){
//$('#personal_detalles4').html(data);
//$('#dataModal4').modal('toggle');
	$("#results").load("listaproveedores/fetch_pagesLP.php");
}
});
});


$(document).on('click', '.view_DUPLICAR', function(){
  //$('#dataModal').modal();
  //var personal_id = $(this).attr("id");
  var personal_id = $(this).attr("id");
  
  $.ajax({
  url:"listaproveedores/VistaPreviaDuplicar.php",
   method:"POST",
   data:{personal_id:personal_id},

    beforeSend:function(){  
    $('#mensajefiltroProveedores').html('CARGANDO'); 
    },    
   success:function(data){
		$('#personal_detalles').html(data);
		$('#dataModal').modal('show');
		/*$("#mensajefiltroProveedores").html("<span id='ACTUALIZADO' >"+data+"</span>");	*/		

   }
  });
 })


			
<?php if($_GET['id']==true){ ?>
							$('#target9').show("swing");
							$('#target2').show("swing");
<?php }else{ ?>
							$('#target9').hide("linear");
							$('#target2').hide("linear");
<?php } ?>

			$('#target3').hide("linear");
			$('#target4').hide("linear");

			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});
			$("#mostrar2").click(function(){
				$('#target2').show("swing");
		 	});
			$("#ocultar2").click(function(){
				$('#target2').hide("linear");
			});

			$("#mostrar3").click(function(){
				$('#target3').show("swing");
		 	});
			$("#ocultar3").click(function(){
				$('#target3').hide("linear");
			});
			
			$("#mostrar4").click(function(){
				$('#target4').show("swing");
		 	});
			$("#ocultar4").click(function(){
				$('#target4').hide("linear");
			});

			$("#mostrartodos").click(function(){
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target11').show("swing");
				$('#target12').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos").click(function(){
				$('#target1').hide("linear");
				$('#target2').hide("linear");	
				$('#target3').hide("linear");
				$('#target4').hide("linear");
				$('#target5').hide("linear");
				$('#target6').hide("linear");
				$('#target7').hide("linear");
				$('#target8').hide("linear");
				$('#target9').hide("linear");
				$('#target10').hide("linear");
				$('#target11').hide("linear");
				$('#target12').hide("linear");
				$('#target13').hide("linear");
				$('#target14').hide("linear");
				$('#target15').hide("linear");
				$('#targetVIDEO').hide("linear");
			});
		});
	</script>