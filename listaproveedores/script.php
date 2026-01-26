<script type="text/javascript">



	$(document).ready(function(){

		
		$("#enviarLISTADO").click(function(){
		var formulario = $("#LISTADOform").serializeArray();
			$.ajax({
			type: "POST",
			url: "listaproveedores/controladorLP.php",
			data: formulario,
		}).done(function(respuesta){
			if($.trim(respuesta) == 'Ingresado'){
		$("#mensajeLISTADO").html(respuesta);
		$('#target9').hide("linear");
		$("#reset").load(location.href + " #reset");		
			}else{
		$("#mensajeLISTADO").html(respuesta);
		$("#reset").load(location.href + " #reset");

			}
			});
	});

			
<?php if($_GET['id']==true){ ?>
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