<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();var nommbrerazon=$("#nommbrerazon_1").val();
var P_NOMBRE_FISCAL_RS_EMPRESA=$("#P_NOMBRE_FISCAL_RS_EMPRESA_1").val();
var P_RFC_MTDP=$("#P_RFC_MTDP_1").val();
var usuario=$("#usuario_1").val();
var contrasenia=$("#contrasenia_1").val();
var email=$("#email_1").val();
var validaLISTADO=$("#validaLISTADO_1").val();
var P_TELEFONO_1_EMPRESA=$("#P_TELEFONO_1_EMPRESA").val();
var CIUDAD_SERVICIO=$("#CIUDAD_SERVICIO").val();
var PAIS_SERVICIO=$("#PAIS_SERVICIO").val();
var PCONTACTADO_POR=$("#PCONTACTADO_POR").val();
var PRODUCTO_O_SERVICIO_9=$("#PRODUCTO_O_SERVICIO_9_1").val();
var CONVENIO_PROVEEDOR=$("#CONVENIO_PROVEEDOR_1").val();


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
'CONVENIO_PROVEEDOR':CONVENIO_PROVEEDOR,


/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'listaproveedores/clases/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
