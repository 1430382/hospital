<?php
	//require 'header.php';  
	include '../conex.php';
	$id_usuario=0;
	$medicamento=0;
	$unidad_de_medida=0;
	$dosis=0;
	$frecuencia=0;
	$via_administracion=0;
	$indicaciones_adicionales=0;
	if(isset($_POST['medicamento'])){
		$medicamento=$_POST['medicamento'];
	}
	if(isset($_POST['unidad_de_medida'])){
		$unidad_de_medida=$_POST['unidad_de_medida'];
	}
	if(isset($_POST['dosis'])){
		$dosis=$_POST['dosis'];
	}
	if(isset($_POST['frecuencia'])){
		$frecuencia=$_POST['frecuencia'];
	}
	if(isset($_POST['via_administracion'])){
		$via_administracion=$_POST['via_administracion'];
	}
	if(isset($_POST['indicaciones_adicionales'])){
		$indicaciones_adicionales=$_POST['indicaciones_adicionales'];
	}
	if(isset($_POST['users'])){
		$users=$_POST['users'];
	}
	
	#boton
	if(isset($_POST['submit'])){
		$query = "INSERT INTO receta(id_receta,id_usuario,medicamento, unidad_de_medida,dosis,frecuencia, via_administracion, indicaciones_adicionales) values(NULL,'$users','$medicamento','$unidad_de_medida','$dosis','$frecuencia','$via_administracion','$indicaciones_adicionales')";
		$res = $con->query($query);

		echo "Datos Guardados";
	}
?>
<html>
	<link rel="stylesheet" type="text/css" href="">
	<body>
		<form method="post">
			
			
			<label>RECETA</label>
			<br>Medicamento:</br>
			<input type="Text" name="medicamento">
			<br>Usuario:</br>
			 <select name="users" id="users">
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

			</select> 
			
			<br>UNIDAD DE MEDIDA:</br>
			<input type="Text" name="unidadmed">
			<br>DOSIS:</br>
			<input type="int" name="dosis">
			<br>FRECUENCIA:</br>
			<input type="Text" name="frecuencia">
			<br>VIA ADMINISTRACION:</br>
			<input type="Text" name="administracion">
			<br>FECHA INICIO</br>
			<input type="date" name="inicio">
			<br>FECHA FIN:</br>
			<input type="date" name="fin">
			<br>INDICACIONES ADICIONALES:</br>
			<input type="Text" name="indicaciones">
			<input type="submit" name="submit">
		</form>
	</body>
</html>

