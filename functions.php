<?php
function fecha($fecha){
		$timestamp = strtotime($fecha);
		$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

		$dia = date('d', $timestamp) ;
		$mes = date('m', $timestamp) - 1;
		$year = date('Y', $timestamp);

		$fecha = "$dia de " . $meses[$mes] . " del $year";
		return $fecha;
	}
/*
function obtener_post($limite, $conexion){
		$query = "SELECT * FROM articulo;";
		$result = $conexion->query($query);
		return mysqli_fetch_all($result,MYSQLI_ASSOC);
	}
*/




 ?>
