<?php  
session_start();
$usuario=$_POST['form-username'];
$password=sha1($_POST['form-password']);
include 'views/conex.php';

$query="SELECT * FROM usuario WHERE usuario='".$usuario."' AND  pass='".$password."'";
$proceso = $con->query($query) ;

	if($resultado=mysqli_fetch_array($proceso)){
		$_SESSION['u_usuario']= $usuario;
		
		header("Location:views/menu.php");
	}else{
		header("Location:sesion.php");

	}
?>