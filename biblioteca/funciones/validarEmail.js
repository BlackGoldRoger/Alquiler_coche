function validarEmail(oForm) {
     // explicación capítulo 13
     // se crea una expresión regular para comprobar
     // el formato de una dirección de email 
     var testMail = new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$","i");
     // si la comprobación es FALSE se emite un aviso
     if ((testMail.test(oForm.value))== false)
 	alert(oForm.value +  " : dirección de email con formato inválido! ");
 	
}
