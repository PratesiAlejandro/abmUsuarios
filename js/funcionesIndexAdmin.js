$(document).ready(function(){
	MostrarGrillaAdmin(); //se muestra la grilla apenas se carga la pagina
});

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
		$("#grillaAdminModificar").html("");
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
   });
}

