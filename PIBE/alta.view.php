<?php
	require 'header.php';  
	include 'conex.php';
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
		$ap=$_POST['ap'];
	}
	if(isset($_POST['am'])){
		$am=$_POST['am'];
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
	#boton
	if(isset($_POST['submit'])){
		$query = "INSERT INTO x(cedula, curp, nombre, ap, am, especialidad,subespecialidad, domicilio,clues) values('$cedula','$curp','$nombre','$ap','$am','$especialidad','$subespecialidad','$domicilio','$clues')";
		$res = $con->query($query);

		echo "Datos Guardados";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Altas</title>
	<font size="6"> <a href="inicio.php"> Inicio.</a> </font>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="wrap">
		<form action="" method="post">
		<font size="6">
		<label>Alta de Usuario</label><br>
		<table border="1" width="100">	
		<label>Cedula:</label><input type="text" name="cedula" placeholder="Cedula:"><br>	
		<label>CURP:</label><input type="text" name="curp" placeholder="Curp:"><br>	
		<label>Nombre:</label><input type="text" name="name" placeholder="Nombre:"><br>
		<label>Apellido Paterno:</label><input type="text" name="ap" placeholder="Apellido Paterno"><br>
		<label>Apellido Materno:</label><input type="text" name="am" placeholder="Apellido Materno"><br>
		<label>Especialidad</label><input type="text" name="especialidad"><br>
		<label>Subespecialidad</label><input type="text" name="subespecialidad"><br>
		<label>Domicilio</label><input type="text" name="domicilio"><br>
		<label>Clues</label><input type="text" name="clues"><br>
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
	require 'footer.php'; ?>
</body>
</html>
