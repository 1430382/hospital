 <?php
	$server="localhost";
	$usuario="root";
	$pass="";
	$baseDatos="hospital1";
	$con = new mysqli($server,$usuario,$pass,$baseDatos);
	$acentos = $con->query("SET NAMES 'utf8'");
	if($con->connect_error){
		die("Error al conectar".$con->connect_error);
	}




 ?>
