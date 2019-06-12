<?php
//Documentos de conexión y header
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

require 'header.med.php';
include '../functions.php';
include '../conexion.php';

//librerias
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();


//Configuracion servidor mail

date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
//if (isset($_POST['sendemail'])) {

////
if (!($res=$con->query("SELECT email FROM cita where fecha='$fechactual'"))) {

}else{
  /*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
  if($row = $res->fetch_assoc()){
    $_SESSION['email']=$row['email'];
    var_dump($_SESSION['email']);
///////////
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
