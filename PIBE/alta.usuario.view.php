<?php
//	require 'header.php';  
	include '../conex.php';
	$id_paciente=0;
	$tdomicilio=0;
	$calle=0;
	$numeroext=0;
	$numeroint=0;
	$colonia=0;
	$codigop=0;
	$telefono1=0;
	$telefono2=0;
	if(isset($_POST['domicilio'])){
		$domicilio=$_POST['domicilio'];
	}
	if(isset($_POST['calle'])){
		$calle=$_POST['calle'];
	}
	if(isset($_POST['numeroext'])){
		$numeroext=$_POST['numeroext'];
	}
	if(isset($_POST['numeroint'])){
		$numeroint=$_POST['numeroint'];
	}
	if(isset($_POST['colonia'])){
		$colonia=$_POST['colonia'];
	}
	if(isset($_POST['codigop'])){
		$codigop=$_POST['codigop'];
	}
	if(isset($_POST['grupoe'])){
		$grupoe=$_POST['grupoe'];
	}	
	if(isset($_POST['telefono1'])){
		$telefono1=$_POST['telefono1'];
	}	
	if(isset($_POST['telefono2'])){
		$telefono2=$_POST['telefono2'];
	}
	#boton
	if(isset($_POST['submit'])){
		$query = "INSERT INTO x(curp, nombre, ap, am, discapacidad, grupoe,telefono1,telefono2) values('$curp','$nombre','$ap','$am','$discapacidad','$grupoe','$telefono1','$telefono2')";
		$res = $con->query($query);

		echo "Datos Guardados";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Altas de paciente</title>
	<font size="6"> <a href="inicio.php"> Inicio.</a> </font>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="wrap">
		<form action="" method="post">
		<font size="6">
		<label>Alta de paciente</label><br>
		<table border="1" width="100">	
		<label>CURP:</label><input type="text" name="curp" placeholder="CURP"><br>
		<label>Nombre:</label><input type="text" name="name" placeholder="Nombre:"><br>
		<label>Apellido Paterno:</label><input type="text" name="ap" placeholder="Apellido Paterno"><br>
		<label>Apellido Materno:</label><input type="text" name="am" placeholder="Apellido Materno"><br>
		<label>Tipo sanguineo</label>
		<select name="select"> 
		<option value="o-">O-</option>
		<option value="o+">O+</option>
		<option value="a-">A-</option>
		<option value="a+">A+</option>
		<option value="b-">B-</option>
		<option value="b+">B+</option>
		<option value="ab-">AB-</option>
		<option value="ab-">AB+</option>
		</select><br>
		<label>Discapacidad</label><input type="text" name="discapacidad" placeholder="Discapacidad"><br>
		<label>Grupo Etnico</label><input type="text" name="grupoe" placeholder="Grupo Etnico"><br>
		<label>Telefono1</label><input type="text" name="telefono1" placeholder="Telefono1"><br>
		<label>Telefono2</label><input type="text" name="telefono2" placeholder="Telefono2"><br>
		</table>
		</font>
		<div class="alert error">
			
		</div>
		<div class="alert success">
		
		</div>

		<input type="submit" name="submit" class="btn btn-primary">
	</form>
	</div>

	<?php 
	//require 'footer.php'; ?>
</body>
</html>
