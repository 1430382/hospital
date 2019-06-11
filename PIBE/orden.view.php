<?php
	$tipodeorden=0;
	$instrucciones_suministro=0;
	$instrucciones_adicionales=0;
	$medico=0;
	$paciente=0;
	$destinatario=0;
	$bool_consentimiento=0;
	$impresion_diagnostica=0;
	$diagnostico=0;
	$procedimiento=0;
	$estados=0;
	$codigo_postal=0;
	$municipios=0;
	$prioridad=0;
	if(isset($_POST['tipodeorden'])){
		$tipodeorden=$_POST['tipodeorden'];
	}
	if(isset($_POST['instrucciones_suministro'])){
		$instrucciones_suministro=$_POST['instrucciones_suministro'];
	}
	if(isset($_POST['instrucciones_adicionales'])){
		$instrucciones_adicionales=$_POST['instrucciones_adicionales'];
	}
	if(isset($_POST['medicos'])){
		$medicos=$_POST['medicos'];
	}
	if(isset($_POST['pacientes'])){
		$pacientes=$_POST['pacientes'];
	}
	if(isset($_POST['destinatarios'])){
		$destinatarios=$_POST['destinatarios'];
	}
	if(isset($_POST['medicamento'])){
		$medicamento=$_POST['medicamento'];
	}
	if(isset($_POST['bool_consentimiento'])){
		$bool_consentimiento=$_POST['bool_consentimiento'];
	}
	if(isset($_POST['impresion_diagnostica'])){
		$impresion_diagnostica=$_POST['impresion_diagnostica'];
	}
	if(isset($_POST['diagnosticos'])){
		$diagnosticos=$_POST['diagnosticos'];
	}
	if(isset($_POST['procedimientos'])){
		$procedimientos=$_POST['procedimientos'];
	}
	if(isset($_POST['estados'])){
		$estados=$_POST['estados'];
	}
	if(isset($_POST['prioridad'])){
		$prioridad=$_POST['prioridad'];
	}
	#boton
	if(isset($_POST['submit'])){
		$query = "INSERT INTO orden(id_orden,tipodeorden,instrucciones_suministro,instrucciones_adicionales,medico,paciente, destinatario,medicamento,bool_consentimiento,impresion_diagnostica,id_diagnostico,id_procedimiento,estado,prioridad) values(NULL,'$tipodeorden','$instrucciones_suministro','$instrucciones_adicionales','$medicos','$pacientes','$destinatarios','$medicamento','$bool_consentimiento','$impresion_diagnostica','$diagnosticos','$procedimientos','$estados','$prioridad')";
		$res = $con->query($query);

		echo "Datos Guardados";
	}
?>


<html>
	<link rel="stylesheet" type="text/css" href="">
	<body>
		<form method="post" >
			
			
			<label>Orden</label>
			<br>fecha:</br>
			<input type="date" name="fecha">
			<br>tipo orden:</br>
			<input type="Text" name="tipodeorden" placeholder="Tipo de Orden">
			<br>instrucciones de suministro:</br>
			<input type="Text" name="instrucciones_suministro" placeholder="Instrucciones de Suministro">
			<br>instrucciones adicionales:</br>
			<input type="Text" name="instrucciones_adicionales" placeholder="Instrucciones Adicionales">
			<br>medico:</br>
			<select name="medicos" id="medicos">
			<?php 
		 			$res="select id_usuario,CONCAT(nombre,' ',paterno,' ',materno) as usuario FROM usuario;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_usuario'];?>">
		 				<?php echo $row['usuario'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select> 
			<br>Paciente:</br>
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
			</select> 			
			<br>destinatario:</br>
			<select name="destinatarios" id="destinatarios">
			<?php 
		 			$res="select id_destinatario,CONCAT(nombre,' ',paterno,' ',materno) as destinatario FROM destinatario;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_destinatario'];?>">
		 				<?php echo $row['destinatario'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select>
			<br>Medicamento:</br>
			<input type="text" name="medicamento" placeholder="Medicamento">
			<br>Consentimiento:</br>
			<input type="Text" name="bool_consentimiento" placeholder="Consentimiento">
			<br>Impresion Diagnostica:</br>
			<input type="Text" name="impresion_diagnostica" placeholder="Impresion Diagnostica">
			<br>fecha inicio:</br>
			<input type="date" name="finicio">
			<br>fecha entrega:</br>
			<input type="date" name="fentrega">
			<br>fecha termino:</br>
			<input type="date" name="ftermino">
			<br>Diagnostico:</br>
			<select name="diagnosticos" id="diagnosticos">
			<?php 
		 			$res="select id_diagnostico,CONCAT(nombre,' ') as diagnostico FROM diagnostico;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_diagnostico'];?>">
		 				<?php echo $row['diagnostico'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select>
			<br>Procedimiento:</br>
			<select name="procedimientos" id="procedimientos">
			<?php 
		 			$res="select id_procedimiento,CONCAT(nombre,' ') as procedimiento FROM procedimiento};"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_procedimiento'];?>">
		 				<?php echo $row['procedimiento'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select>
			<br>estado:</br>
					<select name="estados" id="estados">
			<?php 
		 			$res="select id_estado,CONCAT(nombre,' ') as estadp FROM estado;"; 
		 			$res=$con->query($res);
		 			while ($row = $res->fetch_array()) {
		 				?>
		 				<option value="<?php echo $row['id_estado'];?>">
		 				<?php echo $row['estado'];?>
		 				</option>
		 				<?php
		 			}
		 		?>
			</select><br>
			<br>prioridad:</br>
			<input type="Text" name="prioridad" placeholder="Prioridad">
			<input type="submit" name="submit">
		</form>
<?php 	require 'footer.php'; ?>

