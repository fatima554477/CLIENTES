
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

		$(document).on('click', '.view_LC', function(){
			var personal_id = $(this).attr("id");
			$.ajax({
				url: "listadoclientes/VistaPreviaLC.php",
				method: "POST",
				data: {personal_id: personal_id},
				beforeSend: function(){
					$('#mensajePORVENDEDOR').html('CARGANDO');
				},
				success: function(data){
					$('#personal_detalles').html(data);
					$('#dataModal').modal('show');
					$.getScript(load(1));
				}
			});
		});

		
		$("#enviarLISTADO").click(function(){
		var formulario = $("#LISTADOform").serializeArray();
			$.ajax({
			type: "POST",
			url: "listadoclientes/controladorLP.php",
			data: formulario,
		}).done(function(respuesta){
			
			/*if($.trim(respuesta) == 'Ingresado'){
		$("#mensajeLISTADO").html(respuesta);
		$('#target9').hide("linear");
		$("#reset").load(location.href + " #reset");		
			}else{
		$("#mensajeLISTADO").html(respuesta);
		$("#reset").load(location.href + " #reset");
          // 
			}*/
	//$("#results").load("listadoclientes/fetch_pagesLP.php");
		$("#mensajeLISTADO").html(respuesta);
			$.getScript(load(1)); 
			
			});
	});

		$("#enviarLISTADOENVIARCORREO").click(function(){
		var formulario = $("#LISTADOform").serializeArray();

	formulario.push(
		{ name: "mandacorreo2A", value: 'si' }
	);

			$.ajax({
			type: "POST",
			url: "listadoclientes/controladorLP.php",
			data: formulario,
		}).done(function(respuesta){
			/*
			if($.trim(respuesta) == 'Ingresado'){
		$("#mensajeLISTADO").html(respuesta);
		$('#target9').hide("linear");
		$("#reset").load(location.href + " #reset");		
			}else{

		$("#reset").load(location.href + " #reset");
          //
			}*/
	//$("#results").load("listadoclientes/fetch_pagesLP.php");
		$("#mensajeLISTADO").html(respuesta);	
		 $.getScript(load(1)); 	
			
			});
	});










$("#clickbuscar").click(function(){
const formData = new FormData($('#buscaform')[0]);

$.ajax({
    url: 'listadoclientes/fetch_pagesLP.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(data) {
				
	$("#results").load("listadoclientes/fetch_pagesLP.php");

})
.fail(function() {
    console.log("detect error");
});
});


//NOMBRE DEL BOTÓN
$(document).on('click', '.BORRAR', function(){
var BORRAR = 'BORRAR';
$.ajax({
url:'listadoclientes/fetch_pagesLP.php',
method:'POST',
data:{BORRAR:BORRAR},
beforeSend:function(){
$('#mensajeSUBIRFACTURA').html('cargando');
},
success:function(data){
	
//$('#personal_detalles4').html(data);
//$('#dataModal4').modal('toggle');
$.getScript(load(1));
	$("#results").load("listadoclientes/fetch_pagesLP.php");
	
}
});
});

$(document).on('click', '.view_BORRARLC', function(){

  var borra_LC = $(this).attr("id");
  var borra_listadoC = "borra_listadoC";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
	url: "listadoclientes/controladorLP.php",
   method:"POST",
   data:{borra_LC:borra_LC,borra_listadoC:borra_listadoC},
   
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
			
<?php if($_GET['idc']==true){ ?>
							$('#target9').show("swing");
<?php }else{ ?>
							$('#target9').hide("linear");
<?php } ?>
			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});





		});
	</script>