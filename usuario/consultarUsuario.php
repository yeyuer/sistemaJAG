<?php

//leer: http://php.net/manual/en/function.md5.php
//en resumen: no es seguro

//TODO: implementacion de sha256/512 con salt.


require("../php/master.php");
	if(isset($_POST['enviar'])) {
	
		if (empty($_POST['seudonimo']) || empty($_POST['clave'])) {

			echo "El seudonimo o la Contrase&ntilde;a no han sido ingresada.<a href='javascript:history.back();'>Reintentar</a>";
		}else {
			$conexion = conexion(); // esto es una funcion, no una clase
			$seudonimo = mysqli_real_escape_string($conexion, $_POST['seudonimo']); 
			$clave = mysqli_real_escape_string($conexion, $_POST['clave']); 
			// esto tiene que cambiar:
			// 	porque asume que en el formulario se manda la cadena de texto
			// 	sin ser modificada:
			// $clave = md5($clave);
			$query = "SELECT codigo, cod_tipo_usr from usuario where seudonimo  ='".$seudonimo."' and clave='".$clave."';";
			$sql = conexion($query);
			// si hay errores raros descomentar y comentar la linea anterior:
			//   $sql = conexion($query, 1);
			if ( $sql->num_rows == 1 ) {
				$resultado = mysqli_fetch_assoc($sql);
				session_start();
				$_SESSION['codUsrMod'] = $resultado['codigo'];
				$_SESSION['cod_tipo_usr'] = $resultado['cod_tipo_usr'];
				$_SESSION['seudonimo'] = $seudonimo;
				header("Location: ../index.php");
			}else{?>
				Usuario no existe <a href='../index.php'>Reintentar</a>
			<?php
			}
		}
	}else {
		header("location: ../index.php");
	}

?>