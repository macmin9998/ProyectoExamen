<?php
session_start();
if(isset($_SESSION['sun'])){
	include("includs/conexion.php")
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Borrar Usario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<link rel="stylesheet" href="css/estilos_usuarios.css">
		
		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaBorrarUsuarios.js" ></script>

	</head>
	<body>
	<?php
		include("menu_pagina.html");
	?>
		<form action="" method="post" onsubmit="return validar()">
			<h2>Borrar Usuario</h2>
			<input type="text" name="usuario" id="usuario" placeholder="Usuario">
			<input type="submit" value="Borrar Usuario" id="boton" name ="borrar">
		</form>
		<?php
			if(isset($_POST['borrar']))
			{
				if (isset($_POST['usuario']) || $_POST['usuario']=="") 
				{
					$errors[]="Se requiere del usuario";
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
						$consulta_usuario=$conexion->query("delete from usuarios where usuario='{$_POST['usuario']}'");
				?>
						<div class="anuncio">
							Usuario Borrado
						</div>
				<?php
					}
					else{
				?> 			
						<div class="anuncio">
							Usuario no encontrado
						</div>

				<?php
						}
				}

			}	

				?>

<?php
}else{
	header("location: sinSesion.html");
}
?>			
	</body>
</html>