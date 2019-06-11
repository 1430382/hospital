<?php
require 'header.admin.php';  
include '../conexion.php';

if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}

if($_SESSION['rol']==2){
	header("location: recepcionista.view.php");
}

if($_SESSION['rol']==0){
	header("location: login.view.php");
}

$cedula=0;
$curp=0;
$nombre=0;
$ap=0;
$am=0;
$especialidad=0;
$subespecialidad=0;
$domicilio=0;
$clues=0;
$id_rol=0;

if($_SESSION['rol']==1){
	header("location: medico.view.php");
}

 if(isset($_GET['status'])){
     $status = $_GET['status'];
     if($status == 1){
        echo "<script>
				$(function(){
   					Materialize.toast('El usuario ha sido agregado correctamente', 2200, 'rounded')
				});  
			  </script>";
     }else if($status == 0){
        echo "<script>
				$(function(){
   					Materialize.toast('Ha ocurrido un error, intente nuevamente', 2200, 'rounded')
				});  
			  </script>";
     }
 }

if(isset($_POST['submit_alta'])){
	if(isset($_POST['cedula'])){
	$cedula=$_POST['cedula'];
}
if(isset($_POST['curp'])){
	$curp=$_POST['curp'];
}
if(isset($_POST['name'])){
	$nombre=$_POST['name'];
}
if(isset($_POST['ap'])){
	$paterno=$_POST['ap'];
}
if(isset($_POST['am'])){
	$materno=$_POST['am'];
}
if(isset($_POST['especialidad'])){
	$especialidad=$_POST['especialidad'];
}
if(isset($_POST['subespecialidad'])){
	$subespecialidad=$_POST['subespecialidad'];
}
if(isset($_POST['domicilio'])){
	$domicilio=$_POST['domicilio'];
}
if(isset($_POST['clues'])){
	$clues=$_POST['clues'];
}
if (isset($_POST['id_rol'])) {
	$id_rol=(int)$_POST['id_rol'];
}

		if (!$con->query("CALL alta_cita('$cedula','$curp','$nombre','$paterno','$materno','$especialidad','$subespecialidad','$domicilio','$clues',$id_rol)")) {
    		header("location: recepcionista.view2.php?status=0");
		}else{
			header("location: recepcionista.view2.php?status=1");
		} 

}

?>
<style type="text/css">

	.tabs .tab a{
		color:#1976d2;
	} /*Black color to the text*/

	.tabs .tab a:hover {
		/*background-color:#eee;*/
		color:#0d47a1;
	} /*Text color on hover*/

	.tabs .tab a.active {
		/*background-color:#888;*/
		color:#0d47a1;
	} /*Background and text color when a tab is active*/

	.tabs .indicator {
		background-color:#2196f3;
	} /*Color of underline*/
</style>
<main>
<form method="post" >

	<div class="row">
		<div class="col s12">
			<ul class="tabs blue-text text-darken-4">
				<li class="tab col s6 "><a class="active" href="#alta">Alta Empleado</a></li>
				<li class="tab col s6 "><a href="#visualizar">Visualizar Empleados</a></li>
			</ul>
		</div>
		<div id="alta" class="col s12">
			<br>
			<div class="row">
				<div class="input-field col s1">
					<label>Cedula</label>
					<input type="text" name="cedula" placeholder="Ingrese la cedula" maxlength="8">
				</div>
				<div class="input-field col s2">
					<label>CURP</label>
					<input type="text" name="curp" placeholder="Ingrese el CURP" maxlength="18">	
				</div>
				<div class="input-field col s3">
					<label>Nombre</label>
					<input type="text" name="name" placeholder="Ingrese el nombre" maxlength="50">
				</div>
				<div class="input-field col s3">
					<label>Apellido Paterno</label>
					<input type="text" name="ap" placeholder="Ingrese el apellido paterno" maxlength="50">
				</div>
				<div class="input-field col s3">
					<label>Apellido Materno</label>
					<input type="text" name="am" placeholder="Ingrese el apellido materno" maxlength="50">
				</div>
			</div>

			<div class="row">

				<div class="input-field col s3">
					<label>Especialidad</label>
					<input type="text" name="especialidad" placeholder="Ingrese la especialidad" maxlength="100">
				</div>
				<div class="input-field col s3">
					<label>Subespecialidad</label>
					<input type="text" name="subespecialidad" placeholder="Ingrese la subespecialidad" maxlength="100">
				</div>
				<div class="input-field col s6">
					<label>Domicilio</label>
					<input type="text" name="domicilio" placeholder="Ingrese el domicilio" maxlength="150">
				</div>

			</div>


			<div class="row">
				<div class="input-field col s3">
					<label>Clues</label>
					<input type="text" name="clues" placeholder="Ingrese la Clave Única de Establecimientos de Salud" maxlength="11">
				</div>

				<div class="input-field col s3">
					<select name="id_rol" id="id_rol">
						<option value="" disabled selected>Elija un rol</option>
						<?php 
						$res="SELECT id_rol,nombre as rol FROM rol;"; 
						$res=$con->query($res);
						while ($row = $res->fetch_array()) {
							?>
							<option value="<?php echo $row['id_rol'];?>">
								<?php echo $row['rol'];?>
							</option>
							<?php
						}
						?>
					</select> 
					<label>Rol</label>
				</div>


			</div>
			<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_alta">Emitir
				<i class="material-icons right">send</i>
			</button>


		</div>

		<div id="visualizar" class="col s12">
			<?php 

			$result = $con->query("CALL get_personal()");
			$personal = mysqli_fetch_all($result,MYSQLI_ASSOC);
			?>
			
			<div class="row">
				<div class="col s12">
					<ul class="collection">
					<?php foreach($personal as $empleado): ?>
						<li class="collection-item avatar">
							<i class="material-icons circle">account_circle</i>
							<span class="title"><b><?php echo $empleado['nombre']; ?></b></span>
							<?php if(($empleado['id_rol'])==1): ?>
								<p><b>Especialidad: </b> <?php echo $empleado['especialidad']; ?> <br>
							   <b>Subespecialidad: </b> <?php echo $empleado['subespecialidad']; ?><br>
							</p>
							<?php endif; ?>

							<p>
								<b>Rol:</b> <?php echo $empleado['rol']; ?><br>
								<b>Cedula Profesional: </b> <?php echo $empleado['cedula']; ?><br>
								<b>CLUES: </b> <?php echo $empleado['clues']; ?><br>
								<b>Domicilio: </b> <?php echo $empleado['domicilio']; ?>
							</p>
							
							<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<?php endforeach; ?>
					</ul>
		

		</div>

		</div>

		</div>

		</div>

		</form>
</main>
		<?php 	
		//require 'footer.web.php'; 
		?>

