<?php 
require 'header.web.php';
include '../conexion.php';
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}

if (isset($_SESSION['rol'])) {
	$_SESSION['rol'] = 0;
}

if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 1){
		echo "<script>
		$(function(){
			Materialize.toast('El usuario o contraseña es incorrecto', 2200, 'rounded')
		});  
	</script>";
}else if($status == 2){
		echo "<script>
		$(function(){
			Materialize.toast('Ha ocurrido un error, intente nuevamente', 2200, 'rounded')
		});  
	</script>";
}
}

if (isset($_POST['submit_ver'])) {
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	if (!($res=$con->query("CALL iniciar_sesion('$username','$password')"))) {
		header("location: login.view.php?status=2");
	}else{
		/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
		if($row = $res->fetch_assoc()){
			$_SESSION['rol']=$row['id_rol'];
			$_SESSION['usuario']=$row['id_usuario'];
			if($row['id_rol']==1){
				header("location: medico.view.php");
			}else if($row['id_rol']==2){
				header("location: recepcionista.view.php");
			}
			else if($row['id_rol']==3){
				header("location: medico.view.admin.php");
			}
		}else{
			header("location: login.view.php?status=1");
		}
		//header("location: recepcionista.view.php");
		//$result = $con->query( "CALL iniciar_sesion($username, $password)" );
		///row = $result->fetch_array(MYSQLI_ASSOC);
		//
		
	} 
}


?>
<main>
	<form method="post">
		<br><br><br><br>
		<div class="row">
			<div class="col s2 offset-s5">
				<div class="input-field">
					<label for="username">Nombre de usuario</label>
					<input type="text" id="username" name="username" placeholder="Ingrese el nombre de usuario" maxlength="32">
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col s2 offset-s5">
				<div class="input-field">
					<label for="password">Contraseña</label>
					<input type="password" id="password" name="password" placeholder="Ingrese su contraseña" maxlength="32">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s2 offset-s5">
				<button class="btn waves-effect waves-light blue darken-4 right btn-la" type="submit" name="submit_ver">Iniciar Sesión
					<i class="material-icons right"></i>
				</button>
			</div>
		</div>


		
	</form>     
</main>



<?php 

//require 'footer.web.php'
?>