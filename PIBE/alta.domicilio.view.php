<?php
	//require 'header.php';  
	include '../conex.php';
	$id_paciente=0;
	$tdomicilio=0;
	$calle=0;
	$numeroext=0;
	$numeroint=0;
	$colonia=0;
	$codigop=0;
	$estados=0;
	$codigo_postal=0;
	$municipios=0;
	$telefono1=0;
	$telefono2=0;
	if(isset($_POST['tdomicilio'])){
		$tdomicilio=$_POST['tdomicilio'];
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
	if(isset($_POST['estados'])){
		$estados=$_POST['estados'];
	}	
	if(isset($_POST['municipios'])){
		$municipios=$_POST['municipios'];
	}	
	if(isset($_POST['pacientes'])){
		$pacientes=$_POST['pacientes'];
	}
	#boton
	if(isset($_POST['submit'])){
		$query = "INSERT INTO domicilio(pacientes,tipo_domicilio, calle, numero_ext, numero_int, id_estado, id_municipio,colonia,codigo_postal,telefono_1,telefono_2) values('$pacientes','$tdomicilio','$calle','$numeroext','$numeroint','$estados','$municipios','$colonia','$codigop','$telefono1','telefono2')";
		$res = $con->query($query);

		echo "Datos Guardados";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Altas de domicilio</title>
	<font size="6"> <a href="inicio.php"> Inicio.</a> </font>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="wrap">
		<form action="" method="post">
		<font size="6">
		<label>Alta de domicilio</label><br>
		<table border="1" width="100">
		<label>Paciente</label>
		<select name="pacientes" id="pacientes">
			<?php 
		 			$res="select id_paciente,CONCAT(nombre,' ',paterno,' ',materno) as paciente FROM paciente;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_paciente'];?>">
		 				<?php echo $row['paciente'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select> <br>				
		<label>tipo domicilio:</label><input type="text" name="tipo_domicilio" placeholder="Tipo de domicilio"><br>
		<label>Calle:</label><input type="text" name="calle" placeholder="Calle:"><br>
		<label>Numero externo:</label><input type="text" name="numeroext" placeholder="Numero Externo"><br>
		<label>Numero Interno</label><input type="text" name="numeroint" placeholder="Numero Interno"><br>
		<label>Municipios</label>
		<select name="municipios" id="municipios">
			<?php 
		 			$res="select id_municipio,CONCAT(nombre,' ') as municipio FROM municipio;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_municipio'];?>">
		 				<?php echo $row['municipio'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select><br>
		<label>Colonia</label><input type="text" name="colonia" placeholder="Colonia"><br>
		<label>codigo postal</label><input type="text" name="codigo_postal" placeholder="Codigo Postal"><br>
		<label>Telefono1</label><input type="text" name="telefono1" placeholder="telefono 1"><br>
		<label>Telefono2</label><input type="text" name="telefono2" placeholder="telefono 2"><br>
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
