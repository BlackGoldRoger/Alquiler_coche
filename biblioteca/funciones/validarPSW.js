function validarPSW(oForm) {
    // explicación capítulo 13        
	len=oForm.value.length;

 	if ((len<=3)) {
 		 warn(oForm.value +  ": contraseña debe tener más de 3 caracteres. ");
 	}
}
