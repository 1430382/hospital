function lista_bodegas(valor){
	$.ajax({
		url:'../views/consulta.bo.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>Id</th><th>Nombre</th><th>Direccion</th><th>Modificar</th><th>Eliminar</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td><a href='modificar_bo.php?id="+valores[i][0]+"'>Modificar</a> </td><td><a href='eliminar_bo.php?id="+valores[i][0]+"'>Eliminar</a> </td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}