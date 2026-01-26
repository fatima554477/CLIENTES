<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load2(1);
		});
		function load2(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE_2").val();
			var nommbrerazon=$("#nommbrerazon_2").val();
var P_NOMBRE_FISCAL_RS_EMPRESA=$("#P_NOMBRE_FISCAL_RS_EMPRESA_2").val();
var P_RFC_MTDP=$("#P_RFC_MTDP_2").val();
var usuario=$("#usuario_2").val();
var contrasenia=$("#contrasenia_2").val();
var email=$("#email_2").val();
var validaLISTADO=$("#validaLISTADO_2").val();
var P_TELEFONO_1_EMPRESA=$("#P_TELEFONO_1_EMPRESA_2").val();
var CIUDAD_SERVICIO=$("#CIUDAD_SERVICIO_2").val();
var PAIS_SERVICIO=$("#PAIS_SERVICIO_2").val();
var PCONTACTADO_POR=$("#PCONTACTADO_POR_2").val();
var PRODUCTO_O_SERVICIO_9=$("#PRODUCTO_O_SERVICIO_9_1_2").val();


/*termina copiar y pegar*/
			
			var per_page=$("#per_page").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'nommbrerazon':nommbrerazon,
'P_NOMBRE_FISCAL_RS_EMPRESA':P_NOMBRE_FISCAL_RS_EMPRESA,
'P_RFC_MTDP':P_RFC_MTDP,
'usuario':usuario,
'contrasenia':contrasenia,
'email':email,
'validaLISTADO':validaLISTADO,
'P_TELEFONO_1_EMPRESA':P_TELEFONO_1_EMPRESA,
'CIUDAD_SERVICIO':CIUDAD_SERVICIO,
'PAIS_SERVICIO':PAIS_SERVICIO,
'PCONTACTADO_POR':PCONTACTADO_POR,
'PRODUCTO_O_SERVICIO_9':PRODUCTO_O_SERVICIO_9,


/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader2").fadeIn('slow');
			$.ajax({
				url:'listaproveedores/clases2/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader2").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax2").html(data).fadeIn('slow');
					$("#loader2").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
