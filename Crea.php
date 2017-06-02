<?php
session_start();
if(isset($_SESSION['sun'])){

include "includs/conexion.php";
$id = $_GET['id'];

$busquedaExamen=$conexion->query("select id,nombre from examen where id=$id ");


$buscaPreguntasExamen=$conexion->query(" select titulo,o.nombre, o.valor, o.tipo from examen as exa join encuestas as e on exa.id=e.id_examen join opciones as o on e.id=o.id_encuesta where exa.id='$id' ;");


while($exa = $busquedaExamen->fetch_assoc()){
	
	$idExa=$exa['id'];
	$nombre=$exa['nombre'];
}


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Sistema de encuestas</title>

	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">

	<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="javascript/main.js" ></script>
	
</head>
<body>
	<?php
        include("menu_pagina.html");
    ?>
    <div class="wrap_crea">
    	<h1>Crea preguntas del examen: <?php echo$nombre;?></h1>
    	<?php

		if($buscaPreguntasExamen){

        	$variableActual="";
            $cont=0;

        	while($mostrarExamen = $buscaPreguntasExamen->fetch_assoc()){
	        
	        $variable=$mostrarExamen['titulo'];	
			
			if($variable != $variableActual){
                $cont++;
				echo"<br><h3 class='formatoPreguntaRespuesta'>".$cont.".-&nbsp;".$variable."<h3><br>";
				$variableActual=$variable; 
			}
           
            if( $mostrarExamen['tipo'] == 1 ){

           		echo"<strong class='formatoPreguntaRespuesta'><input type='radio' name='rad".$cont."'  value='".$mostrarExamen['valor']."'>" .$mostrarExamen['nombre']. "&nbsp;&nbsp;"; 
           		echo "</strong><br>";
    		}elseif( $mostrarExamen['tipo'] == 2){
                echo"<input type='checkbox'>" .$mostrarExamen['nombre']. "&nbsp;&nbsp;";
                echo "<br>";  
    		}elseif ( $mostrarExamen['tipo'] ==3 ) {
    			echo"<input type='text'>" .$mostrarExamen['nombre']. "&nbsp;&nbsp;";
    			echo "<br>"; 
    			
    		}


			
			}
		}

 		echo"<div class='linkAgregarPregunta'>";
 	     echo "<a href='agregar1.php?id=".$id." ' >Agregar pregunta</a><br> ";
    	echo"</div>";
    	 ?>
        
           
    	
    	
	</div>
<?php

}else{
    header("location: sinSesion.html");
}
?>    
</body>
</html>