<?php 
	$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($master);
	$jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
	$cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema JAG</title>
	<script type="text/javascript" src="<?php echo $jquery ?>"></script>
	<script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
</head>
<body>