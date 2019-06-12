<!DOCTYPE html>
<html>
<head>
   <title>Hospital Apolo</title><meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <!--Indica al navegador que es una página responsiva-->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale1.0, minimum-scale=1.0">
  <!--Importa JQuery y JavaScript de Materialize -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.js"></script>
  <!--Importa el css de Materialize-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Importa iconos de google-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Navegador optimizado para dispositivos móviles-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
    body {
     display: flex;
     min-height: 100vh;
     flex-direction: column;
 }
 main {
     flex: 1 0 auto;
 }
</style>
</head>
<body>
<header>
<nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;&nbsp;<img src="../images/logo.png"> </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <!--  <li><a href="recepcionista.view.php">Clientes</a></li>
        <li><a href="recepcionista.view2.php">Personal Apolo</a></li>
        <li><a href="ver_citas.rec.php">Visualizar Citas</a></li>    -->
      <!--  <li><a href="web.view.php">Pagina Principal</a></li>-->
      <li><a href="ver_citas.rec.php">Visualizar citas</a></li>
      <li><a href="agendar_citas.php">Agendar citas</a></li>
        <li><a href="web.view.php">Regresar</a></li>
      </ul>
    </div>
 </nav>
 </header>
 


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
			<h4>Enviar notificacion que ya va casi es la cita</h4>

			<br>
      <input type="submit" id="sendemail" name="sendemail" value="Send">
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
			<br><!-- Aqui se guarda cuando se selecciona la fecha en el html--->
				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_ver">Revisar
					<i class="material-icons right">search</i>
				</button>
			</div>
			</div>

			</table>
</div>
</div>
</form>
</main>



