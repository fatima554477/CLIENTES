<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#NOMBRE_EVENTO").val();
var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
var nommbrerazon=$("#nommbrerazon_1").val();
var C_NOMBRE_COMERCIAL_EMPRESA=$("#C_NOMBRE_COMERCIAL_EMPRESA_1").val();
var usuario=$("#usuario_1").val();
var contrasenia=$("#contrasenia_1").val();
var email=$("#email_1").val();
var rfc=$("#rfc_1").val();
var validaLISTADO=$("#validaLISTADO_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page2").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'nommbrerazon':nommbrerazon,
'usuario':usuario,
'C_NOMBRE_COMERCIAL_EMPRESA':C_NOMBRE_COMERCIAL_EMPRESA,
'contrasenia':contrasenia,
'email':email,
'rfc':rfc,
'validaLISTADO':validaLISTADO,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader9").fadeIn('slow');
			$.ajax({
				url:'listadoclientes/clasesFILTRO_LP/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader9").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax2").html(data).fadeIn('slow');
					$("#loader9").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
