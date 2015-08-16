

<html>
	<head>
        <meta charset="UTF-8">
		<title>AJAX</title>
         <!-- bootstrap CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		 <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         <!-- bootstrap -->
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
         <script type="text/javascript">
             function volver(){
                 window.history.back();
             }
         </script>
    </head>
    <body>

    <?php
    
    $btnError =  "<input type='button' class='btn btn-primary' onclick= 'volver()' value='Volver a Sign in'></input>";
    
    if(isset($_POST['email']) && $_POST['password'] && isset($_FILES['fichero']))
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        //
        $ruta=getcwd();  //ruta directorio actual
        $rutaDestino=$ruta."/Fotos/";
    	   $NOMEXT=explode(".", $_FILES['fichero']['name']);
		      $EXT=end($NOMEXT);
		      $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
        $rutaActual = $ruta."/FotosTemp/".$nomarch;
        $nuevoNombre = $email.".".$EXT;
        //Renombro con el email/usuario
        rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombre);
        $rutaActual = $ruta."/FotosTemp/".$nuevoNombre;
        echo $nomarch;
        echo "	</br>";
        echo $rutaActual;
         echo "	</br>";
        echo $rutaDestino.$nuevoNombre;
         echo "	</br>";
        //Muevo a carpeta Fotos
		      rename($rutaActual,$rutaDestino.$nuevoNombre);
        //
        //Se debe guardar en variables de sesion y hacer alta usuario
        $_SESSION["usuario"] = $email;
        var_dump( $_SESSION["usuario"]);
        echo "<div class='alert alert-info' role='alert'> Foto Guardada con éxito en carpeta Fotos del servidor.
        			</br>
        			Deben escribir código de guardado de usuario
        			</div>";
    }
    
    else
    {
    	echo "<div class='alert alert-danger' role='alert'>Debe ingresar mail, password y foto</div></br>";
    	echo $btnError;
    }
    
    
    ?>

	</body>
</html>
