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
//librerias
  require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "pruebasmedicohospital@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='pruebasmedicohospital@gmail.com'; //nombre usuario
$mail->Password = 'Lololol1'; //contraseña

//Agregar destinatario


///
$subject='Ya casi es su cita';
$message='Este correo se manda con tiempo de anticipacion';
$mail->AddAddress($cita['email']);
$mail->Subject = $subject;
$mail->Body = $_POST['message'];

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Enviado Correctamente");
        </script>';
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
<form method="POST">
  <div class="row">
	<!--	<div class="col s12">
      <label for="subject">Asunto:
        <input type="text" name="subject" id="subject">
      </label>
      <br>
      <label for="email">Email destinatario:
        <input type="email" name="email" id="email">
      </label>
      <br>
      <label for="message">Mensaje:
        <textarea name="message" id="message" rows="8" cols="20"></textarea>
      </label>
      <br> -->
			<h4>Enviar notificacion que ya va casi es la cita</h4>

			<br>
      <input type="submit" value="Send">
		</div>


			</div>



</div>

</form>
</main>


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
									<th>Paciente</th>
									<th>Hora</th>
							  	<th>Motivo</th>
                	<th>email</th>
								</tr>
							</thead>

							<tbody>

								<?php foreach($citas as $cita): ?>
									<tr>
										<td><?php echo $cita['nombre_paciente']; ?></td>
										<td><?php echo $cita['hora']; ?></td>
										<td><?php echo $cita['motivo']; ?></td>
                    <td><?php echo $cita['email']; ?></td>

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
