function validarform(){

 var expRegpnom	 =/^[a-zA-Z]{0,20}$/;//^[a-zA-ZÑñÁáÉéÍíÓóÚú]$/;
 var expRegced 	 = /^(?:\+|-)?\d+$/;
 var expRegtlf	 = /^\d{11}$/;

 var verificar = true;
 var cedula 				= document.getElementById("cedula");
 var nacionalidad 	= document.getElementById("nacionalidad");       
 var pnombre 				= document.getElementById("p_nombre");          
 var snombre 				= document.getElementById("s_nombre");          
 var papelli 				= document.getElementById("p_apellido"); 
 var sapelli 				= document.getElementById("s_apellido"); 
 var sexo						= document.getElementById("sexo"); 
 var fecha_nac			= document.getElementById("fec_nac"); 
 var lugar_nac			= document.getElementById("lugar_nac"); 
 var telefono 			= document.getElementById("telefono"); 
 var telefono_o 		= document.getElementById("telefono_otro");     
 var email 					= document.getElementById("email");        
 var parentesco 		= document.getElementById("relacion");
 var vive_alu 			= document.getElementById("vive_con_alumno");      
 var edo 						= document.getElementById("cod_est");  
 var mun 						= document.getElementById("cod_mun");
 var parro 					= document.getElementById("cod_parro");
 var direcc 				= document.getElementById("direcc");
 var codigo_ne 			= document.getElementById("nivel_instruccion");          
 var profesion 			= document.getElementById("profesion");   
 var lugar_tra 			= document.getElementById("lugar_trabajo");   
 var direcc_tra 		= document.getElementById("direccion_trabajo"); 
 var telefono_tra 	= document.getElementById("telefono"); 
  

	if (!cedula.value) {
		alert("Campo de Cedula Requerido");
		cedula.focus();
		verificar = false;
	}
	else if (!expRegced.exec(cedula.value)) {
		alert("Campo Cedula acepta solo numero sin espacio");
		pnombre.focus();
		verificar = false;
	}
	else if (!nacionalidad.value) {
		alert("Campo Nacionalidad Requerido");
		nacionalidad.focus();
		verificar = false;
	}
	else if (!pnombre.value) {
		alert("Campo Primer Nombre Requerido");
		pnombre.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(pnombre.value)) {
		alert("Campo nombre acepta solo letras sin espacio en blanco.");
		pnombre.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(snombre.value)) {
		alert("Segundo Nombre acepta solo letras sin espacio en blanco.");
		snombre.focus();
		verificar = false;
	}
	else if (!papelli.value) {
		alert("Campo Primer Apellido Requerido");
		papellido.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(papelli.value)) {
		alert("Primer Apellido acepta solo letras sin espacio en blanco.");
		papelli.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(sapelli.value)) {
		alert("Segundo Apellido acepta solo letras sin espacio en blanco.");
		sapelli.focus();
		verificar = false;
	}
	else if (!sexo.value) {
		alert("Campo Sexo Requerido");
		cod_sex.focus();
		verificar = false;
	}
	else if (!fecha_nac.value) {
		alert("Campo Fecha de Nacimiento Requerido");
		fecha_nac.focus();
		verificar = false;
	}
	else if (!lugar_nac.value) {
		alert("Campo lugar de Nacimiento Requerido");
		lugar_nac.focus();
		verificar = false;
	}
	else if (!telefono.value) {
		alert("Campo Numero de Telefono Requerido");
		telefono.focus();
		verificar = false;
	}
	else if(!expRegtlf.exec(telefono.value)) {
		alert("Introduzca Telefono Local sin caracteres especiales: ()-_.*/, y solo numeros. Ej: 02124443322");
		tlf.focus();
		verificar = false;
	}
	else if (!parentesco.value) {
		alert("Campo Parentesco Requerido");
		parentesco.focus();
		verificar = false;
	}
	else if (!edo.value) {
		alert("Campo Estado Requerido");
		edo.focus();
		verificar = false;
	}
	else if (!mun.value) {
		alert("Campo Municipio Requerido");
		mun.focus();
		verificar = false;
	}
	else if (!parro.value) {
		alert("Campo Parroquia Requerido");
		parro.focus();
		verificar = false;
	}
	else if (!direcc.value) {
		alert("Campo Direccion Requerido");
		direcc.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(direcc.value)) {
		alert("Direccion acepta solo letras sin espacio en blanco.");
		dir.focus();
		verificar = false;
	}
	else if (profesion.value) {
		alert("Campo Profesion Requerido");
		prof.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(lugar_tra.value)) {
		alert("Lugar de Trabajo acepta solo letras sin espacio en blanco.");
		lug_tra.focus();
		verificar = false;
	}
	else if (!expRegpnom.exec(direcc_tra.value)) {
		alert("Direccion de Trabajo acepta solo letras sin espacio en blanco.");
		dir_tra.focus();
		verificar = false;
	}
	
	else if (verificar=true) {
		alert("Validando");
	    document.getElementById("form").submit();
	}
}



function limpiarform(){
	alert("Limpiando");
	document.getElementById("form").reset();
}



$(function()
{
	var botonEnviar, botonLimpiar;
	botonLimpiar = document.getElementById("limpiar");
	botonLimpiar.onclick = limpiarform;
	botonEnviar = document.form_repre.registrar;
	botonEnviar.onclick = validarform;

});
