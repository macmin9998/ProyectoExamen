<?php
session_start();
if(isset($_SESSION['sun'])){

	$conexion=mysqli_connect("localhost","root","","examenes");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Modificar Usario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos_usuarios.css">

		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaModificarUsuario.js" ></script>


	</head>
	<body>

		<?php
		include("menu_pagina.html");
		?>

		<form action="" method="post" onsubmit="return validar()">
			<h2>Modificar Usuario</h2>
			<input type="text" name="usuario" id="usuario" placeholder="Usuario a modificar">
			<input type="text" name="nuevo_usuario" id="nuevo_usuario" placeholder="Nuevo Usuario">
			<input type="password" name="nueva_clave" id="clave" placeholder="Nueva Clave">
			<input type="submit" value="Modificar Usuario" id="boton" name="modificar">
		</form>
		<?php
			if(isset($_POST['modificar']))
			{
				if (!isset($_POST['usuario']) || $_POST['usuario']=="") 
				{

					$errors[]="Se requiere del usuario";		
				}

				if (!isset($_POST['nuevo_usuario']) || $_POST['nuevo_usuario']=="") 
				{

					$errors[]="Se requiere del nuevo usuario";		
				}

				if ($_POST['usuario'] == $_POST['nuevo_usuario']) 
				{

					$errors[]="El usuario nuevo tiene que ser diferente al anterior";		
				}

				if (!isset($_POST['nueva_clave']) || $_POST['nueva_clave']=="") 
				{
					$errors[]="Se requiere de la nueva clave";	
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
				
					if ($consulta_usuario->num_rows>0) 
					{
						$consulta_modificar=$conexion->query("Update usuarios set usuario ='{$_POST['nuevo_usuario']}', clave='{$_POST['nueva_clave']}' where usuario='{$_POST['usuario']}'");
		?>
						<div>
							Usuario Modificado
						</div>
		<?php
					}	
					else{
		?> 			
						 <div>
							Usuario no encontrado
						 </div>

		<?php
						}
				}
			}	
				?>
<?php
}else{
	echo "no has iniciado sesion";
}
?>

	</body>
</html>