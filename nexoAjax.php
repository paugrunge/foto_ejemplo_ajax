<?php


if(isset($_FILES['fichero0']))
	{
		if(!$_FILES['fichero0']['error'])
		{
			//echo "cargó";
			//echo "<br>";
			$NOMEXT=explode(".", $_FILES['fichero0']['name']);
			$EXT=end($NOMEXT);
			$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp");  //defino antes las extensiones que seran validas

			if(!in_array($EXT, $arrayDeExtValida))
			{
			   echo "<div class='alert alert-danger' role='alert'>Error archivo de extension invalida</div></br>";
			}
			else
			{
    			$tamanio=$_FILES['fichero0']['size'];
    			if($tamanio>1024000)
    			{
    				echo "Error: archivo muy grande!"."<br>";
    			}
    			else
    			{
    				
    			$ruta=getcwd();  //ruta directorio actual
    			$ruta=$ruta."/FotosTemp/";
				
				//Se borra contenido directorio para limpiar de fotos de previws anteriores
    			$handle = opendir($ruta); 
                
				while ($file = readdir($handle))  
				{   
					if (is_file($ruta.$file)) 
					{ 
						unlink($ruta.$file); 
						
					}
				
				} 
    			
    			$nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
    			move_uploaded_file($_FILES['fichero0']['tmp_name'], $ruta.$nomarch);

    			echo  $ruta.$email.".".$EXT;
    			}
			}
		}
		else
		{
			echo "Error: ".$_FILES['fichero0']['error'];
			echo "<br>";
		}
	}
	else
		echo "Error: No cargo archivo";

?>
