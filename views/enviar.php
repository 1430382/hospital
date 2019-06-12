<?php
//Documentos de conexión y header
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
//Codigo para el cron que manda correo
require 'header.med.php';
include '../functions.php';
include '../conexion.php';

//librerias
//se carga la libreria necesaria
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
//Configuracion servidor mail
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
$fechactual=date('Y-m-d', strtotime($fechactual));
//if (isset($_POST['sendemail'])) {
//en base a la consulta si la fecha es igual a la fecha actual manda correo
if (!($res=$con->query("SELECT email FROM cita where fecha='$fechactual'"))) {
}else{
  /*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
  if($row = $res->fetch_assoc()){
    //Se asigna la variable email a sesion por si se ocupa despues
    $_SESSION['email']=$row['email'];
    var_dump($_SESSION['email']);
///////////
////Informacion para el correo
    $mail->From = "pruebasmedicohospital@gmail.com"; //remitente
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //seguridad
    $mail->Host = "smtp.gmail.com"; // servidor smtp
    $mail->Port = 587; //puerto
    $mail->Username ='pruebasmedicohospital@gmail.com'; //nombre usuario
    $mail->Password = 'Lololol1'; //contraseña
    //Agregar destinatario
    //Campos del correo
    $subject='Ya casi es su cita';
    $message='Este correo se manda con tiempo de anticipacion';
    $mail->AddAddress($_SESSION['email']);
    $mail->Subject = $subject;
    $mail->Body = $message;
    //Avisar si fue enviado o no y dirigir al index
    if ($mail->Send()) {
        echo'<script type="text/javascript">
               alert("Enviado Correctamente");
            </script>';
    }
}
}
//}

?>
