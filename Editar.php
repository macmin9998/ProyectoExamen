<?php
include "includs/conexion.php";

$consultaExamen=$conexion->query("select id,nombre from examen ;");




?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Examenes Creados</title>
	
    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/buscar.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="javascript/main.js" ></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript">
        function buscar(){

            var b;
            b=document.getElementById("search").value;
            alert(b);
            
        }

    </script>
<?php
$variablePHP = "<script>document.write(b) </script>";
echo "variablePHP = ".$variablePHP;
?>

     

</head>
<body>
    <?php
        include("menu_pagina.html");
    ?>
    <div class="wrap">
    	<h1>Examenes Creados
        <div>
            <form class="princip"> 
                <input type="text" name="" class="int">
                <input type="submit" name="" class="bt">
            </form>
        <div/>

        </h1>  

    
        
    	<?php




        if(isset($_POST['btnBuscar'])){
            
            echo "busqueda";

        }else{
                

                while($exa = $consultaExamen->fetch_assoc()){
                          
                    
                    echo "<li><a href='Crea.php?id=".$exa['id']." ' >".$exa['nombre']."</a></li><br> ";
                }


            }
                  
        ?>	




		
		</div>
</body>
</html>