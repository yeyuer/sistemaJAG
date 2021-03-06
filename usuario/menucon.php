<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido">
	<div id="blancoAjax">
		<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
		<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
		<div class="contenido">
			<div class="info">
				<p>
					Para hacer una consulta por favor seleccione el tipo de consulta que Ud. desee:
				</p>
			</div>
			<form
				id="consulta_singular_U"
				name="consulta_singular_U"
				action="consultar_U.php"
				method="POST">
				<table>
					<thead>
						<th>Seleccione una opcion</th>
					</thead>
					<tbody>
						<tr>
							<td id="tipo_titulo">Tipo de consulta:</td>
							<td>
								<select
									name="tipo"
									id="tipo"
									autofocus="autofocus"
									required>
									<option selected="selected" value="0">--Seleccione--</option>
									<option value="1">Por cedula</option>
									<option value="2">Por Nombre</option>
									<option value="3">Por Apellido</option>
									<option value="4">Por Cargo</option>
									<option value="5">Regitro activo</option>
									<option value="6">Regitro inactivo</option>
									<option value="7">Todos los Registros</option>
								</select>
							</td>
							<td class="chequeo" id="tipo_chequeo">

							</td>
						</tr>
						<tr>
							<td id="informacion_titulo">
								Favor especifique:
							</td>
							<td>
								<input
									type="text"
									name="informacion"
									id="informacion">
								<?php $query = "SELECT codigo, descripcion from cargo where status = 1;";
									$resultado = conexion($query);?>
								<select name="informacion" id="informacion_lista" hidden>
									<option value="" selected="selected">--Seleccione--</option>
									<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
										<option value="<?php echo $datos['codigo']; ?>">
											<?php echo $datos['descripcion']; ?>
										</option>
									<?php endwhile; ?>
								</select>
							</td>
							<td class="chequeo" id="informacion_chequeo">

							</td>
						</tr>
						<tr>
							<td id="tipo_personal_titulo">
								Seleccione:
							</td>
							<td>
								<?php $query = "SELECT codigo, descripcion from tipo_personal where status = 1;";
									$resultado = conexion($query);?>
								<select name="tipo_personal" id="tipo_personal" required>
									<option value="" selected="selected">--Seleccione--</option>
									<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
										<option value="<?php echo $datos['codigo']; ?>">
											<?php echo $datos['descripcion']; ?>
										</option>
									<?php endwhile; ?>
									<option hidden value="6">Todos</option>
								</select>
							</td>
							<td class="chequeo" id="tipo_personal_chequeo">

							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="submit" value="Consultar">
							</td>
						</tr>
					</tbody>
				</table>
				<div id="error" class="chequeo">
					<!-- chequeo por medio de ajax: -->
					<span class="error" id="error">

					</span>
				</div>
			</form>
			<div class="info">
				Si Ud. desea registrar o actualizar a un personal interno de esta
				institucion, puede hacerlo especificando la cedula de identidad:
			</div>
			<form
				name="form_PI"
				id="form_PI"
				method="GET">
				<table>
					<tbody>
						<tr>
							<td>
								<input
									type="text"
									id="cedula"
									name="cedula"
									maxlength="8"
									required>
							</td>
						</tr>
						<tr>
							<td class="chequeo" id="cedula_chequeo">

							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="submitDos" value="Registrar" disabled>
							</td>
						</tr>
					</tbody>
				</table>
				<div id="error" class="chequeo">
					<!-- chequeo por medio de ajax: -->
					<span class="error" id="error">

					</span>
				</div>
			</form>

		</div>
		<!-- validacion -->
		<script type="text/javascript">
			/**
			 * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
			 *
			 * validaciones de los campos relacionados a las consultas de PI.
			 */
			//debido a que las validaciones hechas por
			//este script solo es usado en este archivo,
			//se considero no pasar este script a un
			//archivo aparte como otros archivos.
			// iniciamos jQuery:
			$(function(){
				// cambiamos de una vez
				// estructura del formulario:
				$('#informacion_titulo').css('color', '#888');
				$('#informacion').prop('disabled', true);
				$('#tipo_personal_titulo').css('color', '#888');
				$('#tipo_personal').prop('disabled', true);
				$('#submit').prop('disabled', true);
				// se cambia la estructura del formulario
				// dependiendo de lo que el usuario escoja en el primer select
				// (tipo) = por cedula, por cargo, etc.
				$('#tipo').on('change', function(){
					var tipo = $(this).val();
					if (tipo === '0') {
						$('#informacion_titulo').show();
						$('#informacion_titulo').css('color', '#888');
						$('#informacion').prop('disabled', true);
						$('#informacion').prop('readonly', false);
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#888');
						$('#tipo_personal').prop('disabled', true);
						$('#submit').prop('disabled', true);
					}else if (tipo === '4'){
						$('#informacion').prop('value', '');
						$('#informacion_titulo').css('color', '#000');
						$('#informacion_titulo').show();
						$('#informacion').prop('readonly', true);
						$('#informacion').prop('hidden', true);
						$('#informacion_lista').prop('disabled', false);
						$('#informacion_lista').prop('hidden', false);
						$('#tipo_personal_titulo').css('color', '#888');
						$('#tipo_personal').prop('value', '6');
						$('#tipo_personal').prop('hidden', true);
						$('#tipo_personal').prop('disabled', false);
						$('#submit').prop('disabled', true);
					}else if (tipo === '5' || tipo === '6'){
						$('#informacion_titulo').hide();
						$('#informacion').prop('disabled', false);
						$('#informacion').prop('hidden', true);
						$('#informacion').prop('readonly', true);
						$('#informacion').prop('value', 'status');
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#000');
						$('#tipo_personal').prop('disabled', false);
						$('#submit').prop('disabled', true);
					}else if (tipo === '7'){
						$('#informacion_titulo').hide();
						$('#informacion').prop('disabled', false);
						$('#informacion').prop('hidden', true);
						$('#informacion').prop('readonly', true);
						$('#informacion').prop('value', 'status');
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#000');
						$('#tipo_personal').prop('disabled', true);
						$('#submit').prop('disabled', false);
					}else{
						$('#informacion').prop('value', '');
						$('#informacion_titulo').show();
						$('#informacion_titulo').css('color', '#000');
						$('#informacion').prop('disabled', false);
						$('#informacion').prop('hidden', false);
						$('#informacion').prop('readonly', false);
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#000');
						$('#tipo_personal').prop('disabled', false);
					};
				});
				//debido a que las validaciones hechas por
				//este script solo es usado en este archivo,
				//se considero no pasar este script a un
				//archivo aparte como otros archivos.
				$('#informacion').on('change', function(){
					var campo = $(this).val().replace(/^\s+|\s+$/g, '');
					if (campo === "") {
						$('#submit').prop('disabled', true);
						$(this).focus();
						$("#informacion_chequeo").html('este campo no puede </br> estar vacio.');
						$("#informacion_titulo").css('color', 'red');
					};
					// valores de expresiones regulares:
					var tipo = $('#tipo').val();
					var numerosChequeo = /[^\d+]/g;
					var	nombresChequeo = /[^A-Za-záéíóúÁÉÍÓÚ-]/g;
					// comprobacion de campos dentro del formulario:
					if (tipo === '1') {
						if(campo.length < 6){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('cedula no puede ser menor a 6 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if(campo.length > 8){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('cedula no puede ser mayor a 8 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if( numerosChequeo.exec(campo) ){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
							$("#informacion_titulo").css('color', 'red');
						}else{
							$("#informacion_chequeo").html('');
							$("#informacion_titulo").css('color', 'green');
							$('#submit').prop('disabled', false);
						}
					}else if( tipo === '2' || tipo === '3' ) {
						if(campo.length > 20){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('este campo no puede ser mayor a 20 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if( nombresChequeo.test(campo) ){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
							$("#informacion_titulo").css('color', 'red');
						}else{
							$("#informacion_chequeo").html('');
							$("#informacion_titulo").css('color', 'green');
							$('#submit').prop('disabled', false);
						}
					};
				});
				// comprobacion del select de cargo:
				$('#informacion_lista').on('change', function(){
					var campo = $(this).val();
					console.log(campo);
					if (campo === '0') {
						$('#submit').prop('disabled', true);
					}else{
						$('#submit').prop('disabled', false);
					};
				});
				// comprobacion del select de tipo_personal:
				$('#tipo_personal').on('change', function(){
					var campo = $(this).val();
					console.log(campo);
					if (campo === '') {
						$('#submit').prop('disabled', true);
					}else{
						$('#submit').prop('disabled', false);
					};
				});
			});
		</script>
		<!-- cedula -->
		<script type="text/javascript">
			/**
			 * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
			 *
			 * chequeo y operaciones relacionadas con ajax
			 * para el campo cedula.
			 *
			 * no se utiliza cedula.js porque este formulario esta estructurado
			 * diferente en comparacion a un formulario normal.
			 */
			$(function(){
				$.ajax({
					url: '../java/validacionCedula.js',
					type: 'POST',
					dataType: 'script'
				});
				$('#cedula').on('change', function(){
					var cedula = $(this).val();
					if ( validacionCedula(cedula) ) {
						$("#cedula_chequeo").empty();
						$.ajax({
							url: '../java/ajax/general/cedula.php',
							type: 'POST',
							data: {cedula:cedula},
							success: function (datos){
								$('#cedula_chequeo').empty();
								//se comprueba si es valido o no por
								//medio del data-disponible
								//true si esta disponible, falso si no.
								var disponible = $(datos+'#disponible').data('disponible');
								if (disponible === true) {
									$('#submitDos').prop('disabled', false);
									$('#submitDos').prop('value', 'Registrar');
									$('#form_PI').prop('action', 'form_reg_PI.php');
								}else{
									$('#cedula_chequeo').html('Este Usuario ya se encuentra en el sistema, si desea ver detalles de	este registro o actualizar el mismo, por favor dele click al boton Ver mas.');
									$('#submitDos').prop('disabled', false);
									$('#submitDos').prop('value', 'Ver mas');
									$('#form_PI').prop('action', 'form_act_PI.php');
								};
							},
						});
					}else{
						$("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
						$("#cedula_titulo").css('color', 'red');
						$('#submitDos').prop('disabled', true);
					};
				});
				// apenas se pretenda enviar el formulario:
				$('#form_PI').on('submit', function (evento){
					//se previene el envio:
					evento.preventDefault();
					// se comprueba que los datos esten en orden:
					var cedula = $('#cedula').val();
					if ( validacionCedula(cedula) ) {
						var action = $(this).attr('action');
						$.ajax({
							url: action,
							type: 'GET',
							dataType: 'html',
							data: {cedula:cedula},
							success: function (datos){
								$("#contenido").empty().append($(datos).filter('#blancoAjax').html());
							},
						});
						return true;
					}else{
						return false;
					};
				});
			});
		</script>
		<!-- <script type="text/javascript">
			// desabilitado por ser incompatible con este formulario
			$(function(){
				$.post('../java/ajax/cedula.js');
			});
		</script> -->
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
