<?php
	include("includs/conexion.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="css\estilos_login.css">
		<script src="javascript\validarLogin.js"></script>
	</head>
	<body>
		<form method="post" onsubmit="return validar();">
			<h2>Iniciar sesión</h2>
			<h4>Introduce tu usuario</h4>
			<input type="text" id="usuario" placeholder="&#128272; usuario" name="usuario">
			<h4>Introduce tu contraseña</h4>
			<input type="password" id="clave" placeholder=" &#128272; contraseña" name="clave">
			<input type="submit" value="Ingresar" name="ingresar">
		</form>

		<?php
			if(isset($_POST['ingresar']))
			{
    			$errors = array();
			 	if (!isset($_POST['usuario']) || $_POST['usuario']=="") 
				{
					$errors[]="Se requiere del usuario";		
				}
				
				if (!isset($_POST['clave']) || $_POST['clave']=="") 
				{
					$errors[]="Se requiere de la clave";	
				}

				if(isset($errors) and count($errors) > 0 )
				{
                    foreach($errors as $error)
                    {
                        echo "<div class='anuncio'>".$error."</div>";
                    }
                }

    			if(count($errors) == 0 )
    			{

					$consulta_usuario=$conexion->query("select * from usuarios where usuario='{$_POST['usuario']}'");
					
					$consulta_clave=$conexion->query("select * from usuarios where clave='{$_POST['clave']}'");
		
					if ($consulta_usuario->num_rows==0) 
					{
		?>				
						<div class="anuncio">
							Error usuario incorrecto
						</div>
		<?php	
					}	
				 	elseif ($consulta_clave->num_rows==0) 
					{ 
		?>
					 <div class="anuncio">
						Error contraseña incorrecta
					  </div>
		<?php
					}	
					else{
			 				header("location: menu_usuario.html");
					    }
				}
			}
		?>

	</body>
</html>
