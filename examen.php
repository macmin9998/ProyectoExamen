<?php

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
    <link rel="stylesheet" href="css/jquery-ui.css">

	<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="javascript/main.js" ></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="javascript/autocompletar.js"></script>
    <script src="javascript/valida_registro.js"></script>
    <script src="javascript/jquery.min.js" ></script>

      




        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
</head>
<body>
	<?php
        include("menu_pagina.html");
    ?>
            <div class="wrap_crea contendor" id="elemento">
                
                <form action="" method="post"  >
                <center>
                    <h2>Registro</h2>
                    <br>
                    Sexo:
                    <select id="sexo">
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>
                    <br>
                    <br>Edad:
                    <input type="text" name="edad" id="edad" size='3'>
                    <br>
                    <br>
                    Escolaridad:
                    <select id="escolaridad">
                        <option value="Primaria">Primaria</option>
                        <option value="Secuandaria">Secundaria</option>
                        <option value="Secuandaria">Bachillerato</option>
                        <option value="Secuandaria">Educación Superior</option>                 
                    </select>

                    <br>
                    <div>
                        <br>
                        <label for="tags">Ciudad De Origen: </label>
                        <input id="tags" class="ui-autocomplete-input">
                    </div>
                    <br>
                    <button class="boton" type="button" id="boton" name="boton">Iniciar Examen</button>
                </center>
            </form>
        </div>



            </div>




   <div > 
    <div id="Cuestionario1" class="wrap_crea hiden">
    	<h1>Cuestionario: <?php echo$nombre;?></h1>
    	<?php

		if($buscaPreguntasExamen){

        	$variableActual="";
            $cont=0;

        	while($mostrarExamen = $buscaPreguntasExamen->fetch_assoc()){
	        
	        $variable=$mostrarExamen['titulo'];	
			
			if($variable != $variableActual){
                $cont++;
				echo"<br><h3>".$cont.".-&nbsp;".$variable."<h3><br>";
				$variableActual=$variable; 
			}
           
            if( $mostrarExamen['tipo'] == 1 ){

           		echo"<input type='radio' name='rad".$cont."'  value='".$mostrarExamen['valor']."'>" .$mostrarExamen['nombre']. "&nbsp;&nbsp;"; 
           		echo "<br>";
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
         echo "<a href='#'>Finalizar Examen</a><br> ";
 	     //echo "<a href='agregar1.ph?id=".$id." ' >Agregar pregunta</a><br> ";
    	echo"</div>";
    	 ?>
        
           
    	
    	
	</div>

    <script>
           $(document).ready(function(){
             $("#boton").click(function(){
                $("#Cuestionario1").show();
                $("#elemento").hide();

             })
             

           });

      </script>
</body>


</html>