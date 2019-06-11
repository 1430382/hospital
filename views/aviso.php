<?php
require 'header.med.php';

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

$mail->AddAddress($_POST['email']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
  echo'<script type="text/javascript">
         alert("Enviado Correctamente");
      </script>';
} else {
  echo'<script type="text/javascript">
         alert("NO ENVIADO, intentar de nuevo");
      </script>';
}
//////////






/////////
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
		<div class="col s12">
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
      <br>
      <input type="submit" value="Send">
		</div>


			</div>



</div>

</form>
</main>
