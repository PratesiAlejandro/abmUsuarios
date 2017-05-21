$(document).ready(function(){
	MostrarGrillaUser(); 
	MostrarGrillaAdmin();
	MostrarGrillaProductosComprador();
	MostrarGrillaProductosVendedor();
	

});

function MostrarGrillaUser() 
{
	//alert("estoy en MostrarGrillaAdmin de js");
	//$("#grillaAdmin").html("holaaaa");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "MostrarGrillaUser"
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		//alert(respuesta);
		
		$("#grillaUsuario").html(respuesta);
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function MostrarGrillaAdmin() 
{
	//alert("estoy en MostrarGrillaAdmin de js");
	//$("#grillaAdmin").html("holaaaa");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "MostrarGrillaAdmin"
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		//alert(respuesta);
		
		$("#grillaAdmin").html(respuesta);
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}


function MostrarGrillaProductosComprador() 
{
	
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "MostrarGrillaProductosComprador"
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		//alert(respuesta);
		
		$("#grillaComprador").html(respuesta);
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function MostrarGrillaProductosVendedor() 
{
	//alert("estoy en MostrarGrillaAdmin de js");
	//$("#grillaAdmin").html("holaaaa");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "MostrarGrillaProductosVendedor"
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		//alert(respuesta);
		
		$("#grillaVendedor").html(respuesta);
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"../php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
					window.location.replace("../html/index.php");
				
	});	
}

function Agregar() 
{
	alert("A...");
	var pagina = "../php/nexo.php";
	var nombre = $("#nombreReg").val();
	var mail = $("#mailReg").val();
	var clave = $("#claveReg").val();
	var tipo;

	SubirFoto(mail);

	var foto = "../tmp/" + mail +  ".jpg";

	if (document.getElementById('administrador').checked) 
	{
  		tipo = $("#administrador").val();
	}
	if (document.getElementById('vendedor').checked) 
	{
  		tipo = $("#vendedor").val();
	}

    if (document.getElementById('comprador').checked) 
	{
  		tipo = $("#comprador").val();
	}

	
	//alert("Nombre: " + nombre + " Clave: " + clave + " Tipo: " + tipo);

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "agregar",
			nombre : nombre,
			mail : mail, 
			clave : clave,
			tipo : tipo,
			foto : foto
		},
        async: true 
    })
	.done(function () { 
		alert("Usuario registrado con exito. Loguearse para ingresar.");
		window.location.replace("../html/login.php");
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function AgregarProdu()
{
	//alert("Agreag en AgregarProdu de js");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "agregarProducto",
		
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaProductosVendedor();
		$("#grillaVendedorAgregar").html(respuesta);
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function AgregarProductosTxt()
{
	//alert("Agreag en AgregarProdu de js");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "agregarProductoTxt",
		
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		
		$("#grillaVendedorAgregar").html(respuesta);

	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}


function InsertProducto()
{
	//alert("estoy en InsertarProducto de js");
	var pagina = "../php/nexo.php";
	var nombre = $("#nombreAgreg").val();
	var porcentaje = $("#porcAgreg").val();
	var fecha = $("#fechaAgreg").val();

	
	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "InsertarProducto",
			nombre : nombre,
			porcentaje : porcentaje,
			fecha : fecha
		
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaProductosVendedor();
		$("#grillaVendedorAgregar").html(respuesta);
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}
function InsertProductoTxt()
{
	
	var pagina = "../php/nexo.php";
	var nombre = $("#nombreAgreg").val();
	var porcentaje = $("#porcAgreg").val();

	
	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "InsertarProducto",
			nombre : nombre,
			porcentaje : porcentaje			
		
		},
        async: true 
    })
	.done(function (respuesta) { 
		
		location.reload();
		$("#grillaVendedorAgregar").html(respuesta);
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function Ingresar()
{
	// Aca me logueo
//	var valorCombo = $("#combo").val();
//	var nombre = $("#nombreLogin").val();
	var pagina = "../php/nexo.php";
	var mail = $("#correoLogin").val();
	var clave = $("#claveLogin").val();

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "json",
        data: {
			queHago : "ingresar",
			mail : mail, 
			clave : clave
			
		},
        async: true 
    })
	.done(function (objJson) { 
		
		//alert(objJson.Mensaje);

		if (objJson.Exito)
		{
			if (objJson.Tipo == "administrador") {

				window.location.replace("../php/UserAdmin.php");
				$("#grillaAdminModificar").show();
			}else
			{
				window.location.replace("../php/UserUser.php");
			};
				
		}
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
		//alert("estoy en .fail");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function Borrar(id)
{
	//alert("estoy en Borrar de js");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "borrar",
			id : id
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaAdmin();
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function BorrarProducto(id)
{
	//alert("estoy en Borrar de js");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "borrarProducto",
			id : id
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaProductosVendedor();
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function BorrarTxt(id)
{
	alert(id);

	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "borrarProductoTxt",
			id : id
		},
        async: true 
    })
	.done(function (respuesta) { 
	
		location.reload();
		//MostrarGrillaProductosVendedor();
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });


}

function TraerUsuario(id)
{
	//alert("estoy en TraerUsuario de js");
	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "traerUsuario",
			id : id
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaAdmin();
		$("#grillaAdminModificar").html(respuesta);
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

// Editar Perfil
function traerUsuarioParaEditarPerfil(id,tipo)
{

	var pagina = "../php/nexo.php";

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "traerUsuarioParaEditarPerfil",
			id : id
		},
        async: true 
    })
	.done(function (respuesta) { 
				

		if (tipo == 1 ) {
   
		$("#grillaAdminModificar").html(respuesta);
	
		}
		
		if(tipo == 2){
			MostrarGrillaProductosVendedor();
		$("#grillaVendedorAgregar").html(respuesta);
		}
		if(tipo == 3){
			MostrarGrillaAdmin();
		$("#grillaAdmin").html(respuesta);
		
		$("#grillaAdminModificar").html(respuesta);

		}
		
		
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}



function Modificar(id)
{
	//alert("estoy en Modificar de js");
	var pagina = "../php/nexo.php";

	var nombre = $("#nombreModif").val();
	var mail = $("#mailModif").val();
	var clave = $("#claveModif").val();
	var tipo = $("#tipoModif").val();

	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "modificar",
			id : id,
			nombre : nombre, 
			mail : mail,
			clave : clave,
			tipo : tipo
		},
        async: true 
    })
	.done(function (respuesta) { 
		//alert(respuesta);
		MostrarGrillaAdmin();
		$("#grillaAdminModificar").html(respuesta);

	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function editarPerfil(id)
{
	alert("Estoy en editar perfil de js."); 
	var pagina = "../php/nexo.php";
	var usuario = $("#usuario").val();
	var mail = $("#mail").val();
	var nombre = $("#nombre").val();
	var dni = $("#dni").val();
	var clave = $("#clave").val();
	var tipo = $("#tipo").val();
	var telefono = $("#telefono").val();
	var importe = $("#importe").val();
	var descripcion = $("#descripcion").val();

	alert(usuario);
	alert(mail);
	alert(nombre);
	alert(clave);
	alert(telefono);
	alert(importe);
	alert(descripcion);
	
	$.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
			queHago : "editarPerfil",
			id : id,
			nombre : nombre, 
			usuario : usuario,
			mail : mail,
			clave : clave,
			dni : dni,
			tipo : tipo,
			telefono : telefono,
			importe : importe,
			descripcion : descripcion			

		},
        async: true 
    })
	.done(function (respuesta) { 
		alert(respuesta);
		//MostrarGrillaProductosComprador();
	//	MostrarGrillaAdmin();
		$("#grillaEditarPerfil").html(respuesta);
	//$("#grillaCompradorParaEditarPerfil").html("");
		alert("Se modifico tu perfil correctamente!!");
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

function ValidarFecha()
{

	alert("valida");
	$(".datepicker").datepicker();
    

}

function SubirFoto(mail){
 
    var pagina = "../php/nexo.php";
    var foto = $("#archivo").val();


 if(foto === "")
 {
  return;
 }

 var archivo = $("#archivo")[0];//foto[0];
 var formData = new FormData(); //permite subir archivos
 formData.append("archivo",archivo.files[0]);//configurar el objeto
 formData.append("queHago", "subirFoto");
 formData.append("mail", mail);


 $.ajax({
        type: 'post',
        url: pagina,
        dataType: "json",
  cache: false,
  contentType: false,
  processData: false,
        data: formData,
        async: true
    })
 .done(function (objJson) {//es una funcion que recibe un delegado una repuesta puede ser cualquier texto
  //alert(objJson);
  if(!objJson.Exito){
   //alert("Hubo un errorrrrrrrrrrrr");
   alert(objJson.Mensaje);
   //return false;
  }
  // else
  // {
  //  return true;
  // }
  
  //destino = objJson.Destino;
  
  //$("#divFoto").html(objJson.Html);
  //Mostrar("MostrarEditarPerfil");
 })
 .fail(function (jqXHR, textStatus, errorThrown) {//recibe mas parametros entre ellos errores
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    }); 
    //son funciones q se disparan depues de que vuelve la funcion de la base de datos  
}



