<?php 
$server='localhost';
$us='root';
$ps='';
$db='inventario';
$con = new mysqli($server,$us,$ps,$db);

if ($con->connect_error) {
	die("error al conectar".$con->connect_error);
}else{
	
}
	
 ?>