
function BorrarCookieComprador() {

	var pagina = "../php/nexo.php";
    var funcionAjax = $.ajax({
    url: pagina,
   
    type: 'POST',
      dataType: "html",
    data:{
          queHago:"BorrarCookie",
          nombre : "comprador", 
			mail : "comp@comp.com",
      clave : "123456"
         }
 })
    .done(function (respuesta) { 
		//alert(objJson.Exito  + objJson.Mensaje + objJson.Tipo);
		alert(respuesta);
		location.reload();
	
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
		//alert("estoy en .fail");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
 
}


function BorrarCookieVendedor() {
	
	var pagina = "../php/nexo.php";
    var funcionAjax = $.ajax({
    url: pagina,
   
    type: 'POST',
      dataType: "html",
    data:{
          queHago:"BorrarCookie",
          nombre : "vendedor", 
			mail : "vend@vend.com.ar",
      clave : "123456"
         }
 })
    .done(function (respuesta) { 
		//alert(objJson.Exito  + objJson.Mensaje + objJson.Tipo);
		alert(respuesta);
		location.reload();
	
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
		//alert("estoy en .fail");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
 
}

function BorrarCookieAdmin() {
	
	var pagina = "../php/nexo.php";
    var funcionAjax = $.ajax({
    url: pagina,
   
    type: 'POST',
      dataType: "html",
    data:{
          queHago:"BorrarCookie",
          nombre : "admin", 
			mail : "admin@admin.com.ar",
      clave : "1234"
         }
 })
    .done(function (respuesta) { 
		//alert(objJson.Exito  + objJson.Mensaje + objJson.Tipo);
		alert(respuesta);
		location.reload();
	
	})
	.fail(function (jqXHR, textStatus, errorThrown) { 
		//alert("estoy en .fail");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
 
}

function BorrarCookie() {
  

  var nombre = $("#nombreLogin").val();
  var mail = $("#correoLogin").val();
  var clave = $("#claveLogin").val();
  
  var pagina = "../php/nexo.php";
    var funcionAjax = $.ajax({
    url: pagina,
   
    type: 'POST',
      dataType: "html",
    data:{
          queHago:"BorrarCookie",
          nombre : nombre, 
      mail :mail,
      clave : clave
         }
 })
    .done(function (respuesta) { 
    //alert(objJson.Exito  + objJson.Mensaje + objJson.Tipo);
   // alert(respuesta);
    location.reload();
  
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
    //alert("estoy en .fail");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
 
}