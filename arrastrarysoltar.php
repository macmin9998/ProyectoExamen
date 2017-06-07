<?php 

include "conexion.php";
$qryExamenCajas=$conexion->query("select id,instrucciones, texto_caja, id_exam from cajas where id_exam=1;");

?>


<html>
    <head>
    <meta charset="utf-8">
        <title>Cajas dinamicas</title>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="stylesheet" href="css/estilos.css">
                <script type="text/javascript">
            
            
            
            //****pertenece al objeto a arrastrar
            //******dragStart desencadena un evento cuando comenzamos a arrastrar el elemento 
            function dragStart(e){
                e.dataTransfer.effectAllowed = 'move';//dataTransfer que informacion vamos a compartir
                //setData declara que datos seran transferidos se aplica a lo que arrastraremos
                e.dataTransfer.setData("Data", e.target.getAttribute('id'));//e.target que objeto a desencadenado wel elemento
                e.dataTransfer.setDragImage(e.target, 0, 0);
                return true;                    
            }
            //****Cuando el elemento esta en la zona de destino
            function dragEnter(e){
                return true;
            }
            //*** lado destino cuando el mouse con el elemento se mueve en la zona del destino
            function dragOver(e){
            //  var esarrastrable = e.dataTransfer.getData("Data");//getData declara que datos seran capturados
            var id = e.target.getAttribute('id');
            if (id == 'destino'){
                return false;
            }
               
            }
            
            //****drop cuando el elemento es soltado en la zona de destino
            function drop(e){
                var esarrastrable = e.dataTransfer.getData("Data");
                e.target.appendChild(document.getElementById(esarrastrable));
                e.stopPropagation();
                return false;
            }
            //***es del lado del elemento desencadena la accion cuando dejamos de arrastrar el elemento
            function dragEnd(e){
                e.dataTransfer.clearData("Data");//va a quitar los div del primer div que los contiene 
                return true
            }       
            
        </script>
        
    </head>
    <body>
        <h1>Acomoda las cajas</h1>
        <form id="Cajas" class="destino" ondragenter="return dragEnter(event)" ondragover="return dragOver(event)" ondrop="return drop(event)">

<?php

$i=0;

while ($listaCajas = $qryExamenCajas->fetch_assoc()) {
    $i++;
    echo "<div id='arrastrable.$i.' class='arrastrable'  draggable='true' ondragstart='return dragStart(event)' ondragend='return dragEnd(event)' >".$listaCajas['texto_caja']."</div>";
}
?>
        
        </form>
        <form id="destino" class="destino" ondragenter="return dragEnter(event)" ondragover="return dragOver(event)" ondrop="return drop(event)">
        </form><br>
        <button type="submit" value="Siguiente"> Siguiente </button>
    </body>
</html>