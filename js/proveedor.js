function lista_proveedores(valor){
	$.ajax({
		url:'../views/consulta_prov.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Correo Electronico</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}