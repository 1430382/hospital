

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesion</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">

    
</head>
<body style="background-color: #222733" ;>

    <div class="container" > 
      
    	<div class="row">

            <div class="col-sm-12" style="margin-top:2%">
                <h1 class="titulo"><strong>Inventario</strong></h1>
                <div class="mydescription">
                    <p class="p">Ingreso de usuario </p>
                </div>
            </div>
      </div>
      <div class="jumbotron  col-sm-8 col-sm-offset-2"> 
          <form action="con_sesion.php" method="POST">
            <div class="row">
              <div class="col-sm-6">
                <p>Digita tu usuario y contraseña:</p>
              </div>
              
            </div>
            <div class="row">
              
              <div class="col-sm-11 ">
                <div class="form-group">
                  <input type="text" name="form-username" placeholder="Usuario..." class="form-control" id="form-username">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-11">
                <div class="form-group">
                              <input type="password" name="form-password" placeholder="Contraseña..." class="form-control" id="form-password">
                          </div>
              </div>
            </div>
            <div class="row">
            <div class="col-sm-9 col-sm-offset-3 " >
                <a href="views/registro_usuario.php" >Registrar nuevo  usuario</a>
            </div>  
        </div>
            <div class="row">
            <br>
              <div class="col-sm-4">
                <input type="submit" name="submit" class="btn btn-primary" value="Guardar">

              </div>
            </div>
            
          </form>
      </div>
    </div>  
      
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>