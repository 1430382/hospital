<?php
//Documentos de conexión y header
require 'header.web.php';
include '../conexion.php';
/*
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}

if($_SESSION['rol']==2){
	header("location: recepcionista.view.php");
}

if($_SESSION['rol']==0){
	header("location: login.view.php");
}*/

//Variables Alta Cita
$paciente_cita = 0;
$medico_cita = 0;
$hora_cita = 0;
$costo_cita = 0;
$motivo_cita = 0;
//Variables Alta Paciente
$curp_alta=0;
$nombre_alta=0;
$paterno_alta=0;
$materno_alta=0;
$tipo_alta=0;
$discapacidad_alta=0;
$calle_alta=0;
$colonia_alta=0;
$numero_alta=0;
$cp_alta=0;
$telefono_alta=0;
/*
if($_SESSION['rol']==1){
	header("location: medico.view.php");
}*/

//Verifica si se completó el registro, de ser así, lo informa al usuario mediante un mensaje
if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 1){
		echo "<script>
		$(function(){
			Materialize.toast('La cita ha sido agendada correctamente', 2200, 'rounded')
		});
	</script>";
}else if($status == 0){
	echo "<script>
	$(function(){
		Materialize.toast('Ha ocurrido un error, intente nuevamente', 2200, 'rounded')
	});
</script>";
}else if($status == 2){
	echo "<script>
	$(function(){
		Materialize.toast('El paciente ha sido registrado correctamente', 2200, 'rounded')
	});
</script>";
}
}

if (isset($_POST['submit_paciente'])) {
	# code...
	if (isset($_POST['curp_alta'])) {
		# code...
		$curp_alta=$_POST['curp_alta'];
	}
	if (isset($_POST['nombre_alta'])) {
		# code...
		$nombre_alta=$_POST['nombre_alta'];
	}
	if (isset($_POST['paterno_alta'])) {
		# code...
		$paterno_alta=$_POST['paterno_alta'];
	}
	if (isset($_POST['materno_alta'])) {
		# code...
		$materno_alta=$_POST['materno_alta'];
	}
	if (isset($_POST['tipo_alta'])) {
		# code...
		$tipo_alta=$_POST['tipo_alta'];
	}
	if (isset($_POST['discapacidad_alta'])) {
		# code...
		$discapacidad_alta=$_POST['discapacidad_alta'];
	}
	if (isset($_POST['calle_alta'])) {
		# code...
		$calle_alta=$_POST['calle_alta'];
	}
	if (isset($_POST['colonia_alta'])) {
		# code...
		$colonia_alta=$_POST['colonia_alta'];
	}
	if (isset($_POST['numero_alta'])) {
		# code...
		$numero_alta=$_POST['numero_alta'];
	}
	if (isset($_POST['cp_alta'])) {
		# code...
		$cp_alta=$_POST['cp_alta'];
	}
	if (isset($_POST['telefono_alta'])) {
		# code...
		$telefono_alta=$_POST['telefono_alta'];
	}

	if (!$con->query("CALL alta_paciente('$curp_alta','$nombre_alta','$paterno_alta','$materno_alta','$tipo_alta','$discapacidad_alta','$calle_alta','$colonia_alta','$numero_alta','$cp_alta','$telefono_alta')")) {
		header("location: recepcionista.view.admin.php?status=0");
		//echo "Falló CALL: (" . $con->errno . ") " . $con->error;
	}else{
		header("location: recepcionista.view.admin.php?status=2");
	}
}


if (isset($_POST['submit_cita'])) {
	# code...
	if (isset($_POST['paciente_cita'])) {
		$paciente_cita=$_POST['paciente_cita'];
	}
	if (isset($_POST['medico_cita'])) {
		$medico_cita=$_POST['medico_cita'];
	}
	if (isset($_POST['hora_cita'])) {
		$hora_cita= $_POST['hora_cita'];
	}
	if (isset($_POST['costo_cita'])) {
		$costo_cita=$_POST['costo_cita'];
	}
	if (isset($_POST['motivo_cita'])) {
		$motivo_cita=$_POST['motivo_cita'];
	}
	if (isset($_POST['fecha_cita'])) {
		$fecha_cita=$_POST['fecha_cita'];
	}


	if (!$con->query("CALL alta_cita($paciente_cita,$medico_cita,'$hora_cita','$costo_cita','$fecha_cita','$motivo_cita')")) {
		header("location: recepcionista.view.admin.php?status=0");
		//echo "Falló CALL: (" . $con->errno . ") " . $con->error;
	}else{
		header("location: recepcionista.view.admin.php?status=1");
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
				<li class="tab col s6 "><a class="active" href="#cita">Generar Cita</a></li>
				<li class="tab col s6 "><a href="#alta">Alta Paciente</a></li>
			</ul>
		</div>
			<div id="cita" class="col s12">
				<br>
				<div class="row">
					<div class="input-field col s3">
						<select name="paciente_cita" id="paciente_cita">
							<option value="" disabled selected>Elija un paciente</option>
							<?php
							$res="SELECT id_paciente,CONCAT(nombre,' ',paterno,' ',materno) as paciente FROM paciente;";
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_paciente'], $row['paciente']);
							}
							?>
						</select>
						<label>Paciente</label>
					</div>
					<div class="input-field col s3">
						<select name="medico_cita" id="medico_cita">
							<option value="" disabled selected>Elija un médico</option>
							<?php
							$res="SELECT id_usuario,CONCAT(nombre,' ',paterno,' ',materno) as medico FROM usuario where id_rol = 1;";
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_usuario'], $row['medico']);
							}
							?>
						</select>
						<label>Médico</label>
					</div>
					<div class="input-field col s3">
						<label for="hora_cita">Hora</label>
						<input type="text" id="hora_cita" name="hora_cita" class="timepicker" placeholder="Hora">
					</div>
					<div class="input-field col s3">
						<label for="costo_cita">Costo</label>
						<input type="text" id="costo_cita" name="costo_cita" placeholder="Ingrese el costo" maxlength="50">
					</div>
				</div>
				<div class="row">
					<div class="col s3">
						<label>Fecha</label>
						<input type="text" class="datepicker" name="fecha_cita">
					</div>
					<div class="input-field col s9">
						<input id="motivo_cita" name="motivo_cita" type="text" placeholder="Ingrese el motivo de la cita" maxlength="100"></textarea>
						<label for="motivo_cita">Motivo</label>
					</div>
				</div>

				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_cita">Agendar
					<i class="material-icons right">send</i>
				</button>


			</div>

		<!--<div id="cobrar" class="col s12">

	</div>-->

	<div id="alta" class="col s12">
		<br>
		<div class="row">
			<div class="input-field col s3">
				<label>CURP</label>
				<input type="text" name="curp_alta" placeholder="Ingrese el CURP" maxlength="18">
			</div>
			<div class="input-field col s3">
				<label>Nombre</label>
				<input type="text" name="nombre_alta" placeholder="Ingrese el nombre" maxlength="50">
			</div>
			<div class="input-field col s3">
				<label>Apellido Paterno</label>
				<input type="text" name="paterno_alta" placeholder="Ingrese el apellido paterno" maxlength="50"><br>
			</div>
			<div class="input-field col s3">
				<label>Apellido Materno</label>
				<input type="text" name="materno_alta" placeholder="Apellido Materno" maxlength="50">
			</div>

		</div>
		<div class="row">
			<div class="col s3">
				<label>Tipo sanguineo</label>
				<select name="tipo_alta">
					<option value="" disabled selected >Elija un tipo</option>
					<option value="O-">O-</option>
					<option value="O+">O+</option>
					<option value="A-">A-</option>
					<option value="A+">A+</option>
					<option value="B-">B-</option>
					<option value="B+">B+</option>
					<option value="AB-">AB-</option>
					<option value="AB+">AB+</option>
				</select>
			</div>
			<div class="input-field col s3">
				<label>Discapacidad</label>
				<input type="text" name="discapacidad_alta" placeholder="En caso de haberla" maxlength="100">
			</div>
			<div class="input-field col s3">
				<label>Calle</label>
				<input type="text" name="calle_alta" placeholder="Ingrese la calle" maxlength="45">
			</div>
			<div class="input-field col s3">
				<label>Colonia</label>
				<input type="text" name="colonia_alta" placeholder="Ingrese la colonia" maxlength="45">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s3">
				<label>Número</label>
				<input type="text" name="numero_alta" placeholder="Ingrese el número" maxlength="10">
			</div>
			<div class="input-field col s3">
				<label>Código Postal</label>
				<input type="text" name="cp_alta" placeholder="Ingrese el código postal" maxlength="10">
			</div>
			<div class="input-field col s3">
				<label for="telefono">Teléfono</label>
				<input type="text" id="telefono_alta" name="telefono" placeholder="Ingrese un teléfono" maxlength="45">
			</div>
		</div>
		<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_paciente">Emitir
			<i class="material-icons right">send</i>
		</button>

	</div>


</div>

</form>
</main>
<?php
//require 'footer.web.php';
?>
