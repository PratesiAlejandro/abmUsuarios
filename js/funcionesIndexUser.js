$(document).ready(function(){
	MostrarGrillaUser(); //se muestra la grilla apenas se carga la pagina
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

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"../php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			alert("Sesión cerrada");
			window.location.replace("../html/index.php");
			//MostarBotones();
			//MostarLogin();
			//$("#usuario").val("Sin usuario.");
			//$("#BotonLogin").html("Login<br>-Sesión-");
			//$("#BotonLogin").removeClass("btn-danger");
			//$("#BotonLogin").addClass("btn-primary");
			
	});	
}

//function Modificar(id)
// {
// 	//alert("estoy en Modificar de js");
// 	var pagina = "../php/nexo.php";
// 	var nombre = $("#nombreModif").val();
// 	var clave = $("#claveModif").val();

// 	$.ajax({ 
//         type: 'POST',
//         url: pagina, 
//         dataType: "html",
//         data: {
// 			queHago : "modificar",
// 			id : id,
// 			nombre : nombre, 
// 			clave : clave
// 		},
//         async: true 
//     })
// 	.done(function (respuesta) { 
// 		//alert(respuesta);
// 		MostrarGrilla();
// 		$("#grillaModificar").html("");
// 	})
// 	.fail(function (jqXHR, textStatus, errorThrown) { 
//         alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
//    });
// }

