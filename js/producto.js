function lista_productos(valor){
	$.ajax({
		url:'../views/consulta_pro.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>Id</th><th>Nombre</th><th>Cantidad</th><th>Fecha Ingreso</th><th>Precio Compra</th><th>Precio Venta</th><th>Tipo</th><th>Bodega</th><th>Usuario</th><th>Modificar</th><th>Eliminar</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td><td>"+valores[i][8]+"</td><td><a href='modificar_pro.php?id="+valores[i][0]+"'>Modificar</a> </td><td><a href='eliminar_pro.php?id="+valores[i][0]+"'>Eliminar</a> </td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}