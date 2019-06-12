<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Documentos de conexión y header
require 'header.med.php';
include '../conexion.php';

if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
//
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');

//
$conn=mysqli_connect("localhost","root","","hospital1") or die("Error in connection");
$query = mysqli_query($conn,"SELECT horaentrada,horasalida,fechalimite from usuario");
    while ($result=  mysqli_fetch_array($query)) {

      $hora_entrada=$result['horaentrada'];
      $hora_salida=$result['horasalida'];
      $fecha_limite=$result['fechalimite'];
      }

//
if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 1){
		echo "<script>
		$(function(){
			Materialize.toast('El horario ha sido agendada correctamente', 2200, 'rounded')
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
$idusuario=$_SESSION['usuario'];
//var_dump($idusuario);


if (isset($_POST['submit_cita'])) {
//
	if (isset($_POST['hora_entrada'])) {
		$hora_entrada=$_POST['hora_entrada'];
	}
	if (isset($_POST['hora_salida'])) {
		$hora_salida= $_POST['hora_salida'];
	}
  if (isset($_POST['fecha_cita'])) {
    $fecha_cita= $_POST['fecha_cita'];
  }
	if (!$con->query("UPDATE usuario SET horaentrada='".$hora_entrada."', horasalida='".$hora_salida."', fechalimite='".$fecha_cita."' WHERE id_usuario='".$idusuario."' ")) {
		header("location: horario.php?status=0");
    $_SESSION['hora_entrada']=$hora_entrada;
    $_SESSION['hora_salida']=$hora_salida;

		//echo "Falló CALL: (" . $con->errno . ") " . $con->error;
	}else{
		header("location: horario.php?status=1");
	}

}


//var_dump($fecha_limite);
$fechactual=date('Y-m-d', strtotime($fechactual));
//var_dump($fechactual);
if ($fecha_limite==$fechactual) {
  echo "<button class=\"button button1\" onclick=\"Mostrar_Ocultar1()\" style=\"height:40px;width:200px\" >Asignar horario</button>";
}else {
  echo "<script>
  $(function(){
    Materialize.toast('La fecha limite que asigno aun no se cumple por ende no puede cambiar su horario', 2200, 'rounded')
  });
  </script>";
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
<script type="text/javascript">
  function Mostrar_Ocultar1(){
    var caja = document.getElementById("caja1");
    if(caja.style.display == "none"){
      document.getElementById("caja1").style.display = "block";
    }else{
      document.getElementById("caja1").style.display = "none";

    }
  }

</script>
<main>
  <section id="caja1" style="display: none;">


<form method="post" >

	<div class="row">
		<div class="col s12">
			<ul class="tabs blue-text text-darken-4">
				<li class="tab col s6 "><a class="active" href="#cita">Asignar horario</a></li>
			<!--	<li class="tab col s6 "><a href="#alta">Alta Paciente</a></li> -->
			</ul>
		</div>
			<div id="cita" class="col s12">
        <div class="row">
          <div class="col s3">
            <label>Fecha</label>
            <input type="text" class="datepicker" name="fecha_cita" >
          </div>
        </div>
				<br>
				<div class="row">
          <div class="input-field col s3">
						<label for="hora_cita">Hora entrada</label>
						<input type="text" id="hora_entrada" name="hora_entrada" class="timepicker" placeholder="Hora">
					</div>

          <div class="input-field col s3">
            <label for="hora_cita">Hora salida</label>
            <input type="text" id="hora_salida" name="hora_salida" class="timepicker" placeholder="Hora">
          </div>

  				</div>
				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_cita">Hecho
					<i class="material-icons right">send</i>
				</button>


			</div>
</div>

</form>
  </section>
  <br>
  <!-- <button class="button button1" onclick="Mostrar_Ocultar1()" >Asignar horario</button> -->
  <?php


  //require 'footer.web.php';
  ?>
</main>
