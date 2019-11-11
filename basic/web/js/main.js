//FUNCION QUE MUESTRA MODAL DE LOS PAISES
$(function(){
    $('.crearlink').click(function(){
        $('#modalindex').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
});
//FUNCION QUE MUESTRA MODAL DE SALIR
$(function(){
    $('.salirLink').click(function(){
        $('#modalsalir').modal('show')
                .find('#modalContent');
    });
});

//FUNCION QUE VALIDA QUE SOLO SE PUEDAN ENTRAR NUMEROS
function valida_numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;
    next = 0;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 || tecla == 9){
        return true;
    }
    if (tecla == 13){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9-,-.]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//FUNCION QUE VALIDA QUE SOLO SE PUEDAN TECLEAR LETRAS
function valida_letras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 || tecla == 9 ){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[a-z A-Z \ñ \Ñ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//FUNCION PARA SETEAR EL FOCUS EN EL MODAL QUE SE MUESTRE CON EL ATRIBUTO FOCUS
/*$(window.document).on('shown.bs.modal', '.modal', function() {
    window.setTimeout(function() {
        $('[autofocus]', this).focus();
    }.bind(this), 1);
});*/

//FUNCIONES QUE MUEVEN EL FOCO AL PRESIONAR ENTER
function nextFocus(inputF, inputS) {
  document.getElementById(inputF).addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
      document.getElementById(inputS).focus();
    }
  });
}

function saltar(e,id)
{
	// Obtenemos la tecla pulsada
	(e.keyCode)?k=e.keyCode:k=e.which;
	// Si la tecla pulsada es enter (codigo ascii 13)
	if(k==13)
	{
		// Si la variable id contiene "submit" enviamos el formulario
		if(id=="submit")

		{
			document.forms[0].submit();
		}else{
			// nos posicionamos en el siguiente input
			document.getElementById(id).focus();
		}
	}
}
