<?php 
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace); ?>


<?php /*si el codigo es mandado como parametro hace esto:*/?>
<?php if ( isset($_REQUEST['cod_est']) ): ?>
	<?php $query = "select * from estado where status = 1;";
	$consulta = conexion($query);
	while( $fila = mysqli_fetch_array($consulta) ) : ?>
		<?php if ($fila['codigo'] == $_REQUEST['cod_est']): ?>
			<option 
				selected="selected"
				value="<?php echo $fila['codigo'] ?>">
				<?php echo utf8_encode($fila["descripcion"]) ?>
			</option>
		<?php else: ?>
			<option value="<?php echo $fila['codigo'] ?>">
				<?php echo utf8_encode($fila["descripcion"]) ?>
			</option>
		<?php endif ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php /*sino entonces es como si no paso nada:*/ ?>
	<?php $query = "select * from estado where status = 1;";?>
	<?php $consulta = conexion($query);?>
	<option value="">--Seleccionar--</option>
	<?php while ($fila = mysqli_fetch_array($consulta)) : ?>
		<option value="<?php echo $fila["codigo"] ?>">
		 <?php echo utf8_encode($fila["descripcion"]); ?>
		</option>
	<?php endwhile ?>
<?php endif ?>