<?php
//Documentos de conexión y header
require 'header.med.php';
include '../functions.php';
include '../conexion.php';
/*
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}

if($_SESSION['rol']==0){
	header("location: login.view.php");
}

if($_SESSION['rol']==1){
	header("location: medico.view.php");
}
*/
?>
<main>
<form method="post">
<div class="row">
<br>
	<div class="col s7">
		<h4>Visualizar citas</h4>

	</div>
			<div class="col s2">
				<label>Elija una fecha</label>
				<input type="text" class="datepicker" name="fecha_ver">
			</div>

			<div class="col s2">
			<br>
				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_ver">Revisar
					<i class="material-icons right">search</i>
				</button>
			</div>
			</div>

			<?php

			if (isset($_POST['submit_ver'])&&isset($_POST['fecha_ver'])&&$_POST['fecha_ver']!="") {
				# code...
				$fecha=$_POST['fecha_ver'];
				$result = $con->query("CALL get_citas('$fecha')");
				$citas = mysqli_fetch_all($result,MYSQLI_ASSOC);
				visualizar($fecha,$citas);
			}

			function visualizar($fecha, $citas){

				if (empty($citas)) {
					echo "<div class='col s8'><h4 class='blue-text text-darken'>No hay citas para este día</h4></div>";
				}else{

				?>
				<div class="row">
					<div class="col s12">
					<?php echo "<p>Citas del día ".fecha($fecha)."</p>"; ?>
						<table class="highlight">
							<thead>
								<tr>
								<!--	<th>Paciente</th> -->
									<th>Hora</th>
							<!--		<th>Motivo</th> -->
								</tr>
							</thead>

							<tbody>

								<?php foreach($citas as $cita): ?>
									<tr>
								<!--		<td><?php echo $cita['nombre_paciente']; ?></td> -->
										<td><?php echo $cita['hora']; ?></td>
									<!--	<td><?php echo $cita['motivo']; ?></td> -->

									</tr>
								<?php endforeach; ?>
							</tbody>
						</div>
					</div>
					<?php
				}
			}
				?>
</table>
</div>
</div>
</form>
</main>



<?php
//require 'footer.web.php';
?>
