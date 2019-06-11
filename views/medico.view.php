<?php
require 'header.med.php';  
include '../conexion.php';
require('../fpdf.php');
//Variables para el formulario de emitir orden
$tipo_orden="";
$instrucciones_suministro="";
$instrucciones_adicionales="";
$medico_orden="";
$paciente_orden="";
$destinatario_orden="";
$medicamento_orden="";
$bool_consentimiento=0;
$impresion_diagnostica="";
$diagnostico_orden=0;
$procedimiento_orden=0;
$estado_orden="";
$inicio_orden=null;
$entrega_orden=null;
$termino_orden=null;
$prioridad_orden=0;

if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}

if($_SESSION['rol']==0){
	header("location: login.view.php");
}

if($_SESSION['rol']==2){
	header("location: recepcionista.view.php");
}

if (isset($_POST['submit_orden'])) {
	# code...
	if (isset($_POST['tipo_orden'])) {
		# code...
		$tipo_orden=$_POST['tipo_orden'];
	}
	if (isset($_POST['instrucciones_suministro'])) {
		# code...
		$instrucciones_suministro=$_POST['instrucciones_suministro'];
	}
	if (isset($_POST['instrucciones_adicionales'])) {
		# code...
		$instrucciones_adicionales=$_POST['instrucciones_adicionales'];
	}
	if (isset($_POST['medico_orden'])) {
		# code...
		$medico_orden=$_POST['medico_orden'];
	}
	if (isset($_POST['paciente_orden'])) {
		# code...
		$paciente_orden=$_POST['paciente_orden'];
	}
	if (isset($_POST['destinatario_orden'])) {
		# code...
		$destinatario_orden=$_POST['destinatario_orden'];
	}
	if (isset($_POST['medicamento_orden'])) {
		# code...
		$medicamento_orden=$_POST['medicamento_orden'];
	}
	if (isset($_POST['bool_consentimiento'])) {
		# code...
		$bool_consentimiento=$_POST['bool_consentimiento'];
	}
	if (isset($_POST['impresion_diagnostica'])) {
		# code...
		$impresion_diagnostica=$_POST['impresion_diagnostica'];
	}
	if (isset($_POST['impresion_diagnostica'])) {
		# code...
		$impresion_diagnostica=$_POST['impresion_diagnostica'];
	}
	if (isset($_POST['diagnostico_orden'])) {
		# code...
		$diagnostico_orden=$_POST['diagnostico_orden'];
	}
	if (isset($_POST['procedimiento_orden'])) {
		# code...
		$procedimiento_orden=$_POST['procedimiento_orden'];
	}
	if (isset($_POST['estado_orden'])) {
		# code...
		$estado_orden=$_POST['estado_orden'];
	}
	if (isset($_POST['prioridad_orden'])) {
		# code...
		$prioridad_orden=$_POST['prioridad_orden'];
	}
	if (isset($_POST['inicio_orden'])) {
		# code...
		$inicio_orden=$_POST['inicio_orden'];
	}
	if (isset($_POST['entrega_orden'])) {
		# code...
		$entrega_orden=$_POST['entrega_orden'];
	}
	if (isset($_POST['termino_orden'])) {
		# code...
		$termino_orden=$_POST['termino_orden'];
	}

	if (!$con->query("CALL alta_orden('$tipo_orden','$instrucciones_suministro','$instrucciones_adicionales',$medico_orden,$paciente_orden,$destinatario_orden,'$medicamento_orden',$bool_consentimiento,'$impresion_diagnostica','$inicio_orden','$entrega_orden','$termino_orden',$diagnostico_orden,$procedimiento_orden,'$estado_orden','$prioridad_orden')")) {
		header("location: medico.view.php?status=0");
		//echo "Falló CALL: (" . $con->errno . ") " . $con->error;
	}else{
		header("location: medico.view.php?status=2");
	} 
}





//Variables para el formulario de emitir receta
$medicamento_receta="";
$paciente_receta="";
$unidad_de_medida="";
$dosis=0;
$frecuencia="";
$fechainicio_receta="";
$fechafin_receta="";
$via_administracion="";
$indicaciones_adicionales="";

$medico_receta = $_SESSION['usuario'];


//Verifica si se completó el registro, de ser así, lo informa al usuario mediante un mensaje
if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 1){
		echo "<script>
		$(function(){
			Materialize.toast('La receta ha sido emitida correctamente', 2200, 'rounded')
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
		Materialize.toast('La orden ha sido registrada correctamente', 2200, 'rounded')
	});  
</script>";
}
}

if (isset($_POST['submit_receta'])) {
	//Variables del formulario emitir receta
	if(isset($_POST['medicamento_receta'])){
		$medicamento_receta=$_POST['medicamento_receta'];
	}
	if(isset($_POST['unidad_de_medida'])){
		$unidad_de_medida=$_POST['unidad_de_medida'];
	}
	if(isset($_POST['paciente_receta'])){
		$paciente_receta=$_POST['paciente_receta'];
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
	if(isset($_POST['inicio'])){
		$fechainicio_receta=$_POST['inicio'];
	}
	if(isset($_POST['fin'])){
		$fechafin_receta=$_POST['fin'];
	}
	if (!$con->query("CALL alta_receta($paciente_receta,$medico_receta,'$medicamento_receta','$unidad_de_medida',$dosis,'$frecuencia','$via_administracion','$fechainicio_receta','$fechafin_receta','$indicaciones_adicionales')")) {
		$stmt = $con->prepare("CALL get_paciente(?)");
		$stmt->bind_param("s", $paciente_receta);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		//$paciente_pt=$con->query('CALL get_paciente($paciente_receta)');
		//$paciente_pt_imprimir = $paciente_pt->fetch_array();
		$pdf = new FPDF();
		$pdf->AddPage();
		 // Logo
		$pdf->Image('../images/logo.png',10,8,33);
    		// Arial bold 15
		$pdf->SetFont('Arial','B',15);
    	// Movernos a la derecha
		$pdf->Cell(80);
   		 // Título
		$pdf->Cell(30,10,'Receta Clinica Apolo',1,0,'C');
   		 // Salto de línea
		$pdf->Ln(20);
		$pdf->Cell(40,10,'Paciente: '.implode($row));
		$pdf->Ln(20);
		$pdf->Cell(40,10,'Medicamento: '.$medicamento_receta);	
		$pdf->Ln(20);	
		$pdf->Cell(40,10,'Dosis: '.$dosis." ".$unidad_de_medida." con una frecuencia de ".$frecuencia);
		$pdf->Ln(20);
		$pdf->Cell(40,10,'Via de administracion: '.$via_administracion);
		$pdf->Ln(20);
		$pdf->Cell(40,10,'Indicaciones adicionales: '.$indicaciones_adicionales);
		$pdf->Ln(40);
		$pdf->Cell(40,10,'Firma________________________');
		ob_end_clean();
		$pdf->Output('F','receta.pdf');
		header("location: medico.view.php?status=0");
		//echo "Falló CALL: (" . $con->errno . ") " . $con->error;
	}else{
		header("location: medico.view.php?status=1");
	} 

}

?>
<style type="">
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
	<form method="post" >

		<div class="row">
			<div class="col s12">
				<ul class="tabs blue-text text-darken-4">
					<li class="tab col s6 "><a class="active" href="#receta">Emitir Receta</a></li>
					<li class="tab col s6 "><a href="#orden">Emitir Orden</a></li>
				</ul>
			</div>
			<div id="receta" class="col s12">
				<br>
				<div class="row">
					<div class="input-field col s3">
						<label>Medicamento</label>
						<input type="Text" id="medicamento_receta" name="medicamento_receta" placeholder="Ingrese un medicamento">

					</div>
					<div class="input-field col s3">
						<select name="paciente_receta" id="paciente_receta">
							<option value="" disabled selected>Elija un paciente</option>
							<?php 
							$res="SELECT id_paciente,CONCAT(nombre,' ',paterno,' ',materno) as paciente FROM paciente;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_paciente'], $row['paciente']);
							}
							?>
						</select> 
						<label>Paciente</label>
					</div>
					<div class="input-field col s3">
						<select name="unidad_de_medida">
							<option value="" disabled selected>Elija una</option>
							<option value="mg">mg</option>
							<option value="ml">ml</option>
						</select>
						<label>Unidad de medida</label>
					</div>
					<div class="input-field col s3">
						<input type="Text" name="dosis" id="dosis" placeholder="Ingrese la dosis">
						<label for="dosis">Dosis</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s3">
						<input type="Text" id="frecuencia" name="frecuencia" placeholder="Frecuencia de consumo">
						<label for="frecuencia">Frecuencia</label>
					</div>
					<div class="input-field col s3">
						<select name="via_administracion">
							<option value="" disabled selected>Elija una vía de administración</option>
							<option value="Oral">Oral</option>
							<option value="Sublingual">Sublingual</option>						
							<option value="Rectal">Rectal</option>
							<option value="Intravenosa">Intravenosa</option>
							<option value="Intramuscular">Intramuscular</option>
							<option value="Subcutánea">Subcutánea</option>
							<option value="Dérmica">Dérmica</option>
							<option value="Nasal">Nasal</option>
							<option value="Oftamológica">Oftamológica</option>
							<option value="Inalatoria">Inalatoria</option>
							<option value="Epdirual">Epdirual</option>
							<option value="Intratecal">Intratecal</option>
						</select>
						<label>Vía Administración</label>
					</div>
					<div class="col s3">
						<label>Fecha Inicio</label>
						<input type="text" class="datepicker" name="inicio">
					</div>
					<div class="col s3">					
						<label>Fecha Fin</label>
						<input type="text" class="datepicker" name="fin">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<textarea id="indicaciones" name="indicaciones_adicionales" class="materialize-textarea"></textarea>
						<label for="indicaciones">Indicaciones Adicionales</label>
					</div>

				</div>
				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_receta">Emitir
					<i class="material-icons right">send</i>

				</button>
			</div>


			<!--Formulario de emitir orden-->
			<div id="orden" class="col s12">
				<br>	
				<div class="row">	
					<div class="input-field col s3">

						<select name="tipo_orden">
							<option value="" disabled selected>Elija un tipo</option>
							<option value="Nota Ambulatoria">Nota Ambulatoria</option>
							<option value="Nota Hospitalaria">Nota Hospitalaria </option>
							<option value="Nota Quirúrgica">Nota Quirúrgica</option>
							<option value="Interconsulta">Interconsulta</option>
							<option value="Tratamiento">Tratamiento</option>
							<option value="Examen de Laboratorio">Examen de Laboratorio</option>					
							<option value="Reporte de Radiología">Reporte de Radiología</option>
						</select>
						<label>Tipo de Orden</label>
					</div>
					<div class="input-field col s3">
						<input type="Text" id="instrucciones_suministro" name="instrucciones_suministro" placeholder="Ingrese las instrucciones de suministro">
						<label for="instrucciones_suministro">Instrucciones de Suministro</label>
					</div>
					<div class="input-field col s3">
						<input type="Text" id="instrucciones_adicionales" name="instrucciones_suministro" placeholder="Ingrese las instrucciones adicionales">
						<label for="instrucciones_adicionales">Instrucciones Adicionales</label>
					</div>
					<div class="input-field col s3">
						<select name="medico_orden" id="medico_orden">
							<option value="" disabled selected>Elija un médico</option>
							<?php 
							$res="SELECT id_usuario,CONCAT(nombre,' ',paterno,' ',materno) as medico FROM usuario where id_rol = 1;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_usuario'], $row['medico']);
							}
							?>
						</select> 
						<label>Médico</label>
					</div>
				</div>
				<div class="row">	
					<div class="input-field col s3">
						<select name="paciente_orden" id="paciente_orden">
							<option value="" disabled selected>Elija un paciente</option>
							<?php 
							$res="SELECT id_paciente,CONCAT(nombre,' ',paterno,' ',materno) as paciente FROM paciente;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_paciente'], $row['paciente']);
							}
							?>
						</select> 	
						<label>Paciente</label>
					</div>	
					<div class="input-field col s3">	
						<select name="destinatario_orden" id="destinatario_orden">
							<option value="" disabled selected>Elija un destinatario</option>
							<?php 
							$res="SELECT id_usuario,CONCAT(nombre,' ',paterno,' ',materno) as destinatario FROM usuario;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_usuario'], $row['destinatario']);
							}
							?>
						</select>
						<label>Destinatario</label>
					</div>
					<div class="input-field col s3">
						<input type="text" id="medicamento_orden" name="medicamento_orden" placeholder="Medicamento">
						<label for="medicamento">Medicamento</label>
					</div>
					<div class="input-field col s3">
						<select name="consentimiento_orden">
							<option value="" disabled selected>Elija una opción</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
						<label>Consentimiento</label>
					</div>
				</div>
				<div class="row">	
					<div class="input-field col s3">
						<input type="Text" id="impresion_diagnostica" name="impresion_diagnostica" placeholder="Impresion Diagnostica">
						<label for="impresion_diagnostica">Diagnostico Clínico</label>
					</div>
					<div class="col s3">
						<label>Fecha Inicio</label>
						<input type="text" class="datepicker" name="inicio_orden">
					</div>
					<div class="col s3">
						<label>Fecha Entrega</label>
						<input type="text" class="datepicker" name="entrega_orden" value="<?php echo date("Y-m-d");?>">
					</div>
					<div class="col s3">
						<label>Fecha Termino</label>
						<input type="text" class="datepicker" name="termino_orden">
					</div>
				</div>
				<div class="row">	
					<div class="input-field col s3">
						<select name="diagnostico_orden" id="diagnostico_orden">
							<option value="" disabled selected>Elija un diagnóstico</option>
							<?php 
							$res="SELECT id_diagnostico,nombre as diagnostico FROM diagnostico;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_diagnostico'], $row['diagnostico']);
							}
							?>
						</select>
						<label>Diagnóstico</label>
					</div>
					<div class="input-field col s3">
						<select name="procedimiento_orden" id="procedimiento_orden">
							<option value="" disabled selected>Elija un procedimiento</option>
							<?php 
							$res="SELECT id_procedimiento,nombre as procedimiento FROM procedimientos;"; 
							$res=$con->query($res);
							while ($row = $res->fetch_array()) {
								printf("<option value='%s'> %s </option>",$row['id_procedimiento'], $row['procedimiento']);
							}
							?>
						</select>
						<label>Procedimientos</label>
					</div>
					<div class="input-field col s3">
						<select name="estado_orden">
							<option value="" disabled selected>Elija un estado</option>
							<option value="Aprobada">Aprobada</option>
							<option value="En espera">En espera</option>
						</select>
						<label>Estado</label>
					</div>
					<div class="input-field col s3">
						<select name="prioridad_orden">
							<option value="" disabled selected>Elija una prioridad</option>
							<option value="Urgente">Urgente</option>
							<option value="Normal">Normal</option>
						</select>
						<label>Prioridad</label>
					</div>
				</div>
				<button class="btn waves-effect waves-light blue darken-4 right" type="submit" name="submit_orden">Emitir
					<i class="material-icons right">send</i>
				</button>

			</div>
		</div>

	</form>
</main>
<?php 	
//require 'footer.web.php'; 
?>

