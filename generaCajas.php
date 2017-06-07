<?php 
require ("includs/conexion.php");
/*session_start();
if(isset($_SESSION['sun'])){

*/

if(isset($_POST['guarda'])){
  $cajas =$_POST['num_cajas'];
  $instruccion = $_POST['txt_instrucciones'];
  $insertaExamen=$conexion->query("insert into examen(nombre) values('CAJAS')");
  $idtxt = 0;
		for($i=1; $i<=$cajas; $i++){
			$idtxt++;
			$txtcaja =$_POST['text'.$idtxt];

			$insertaCajas=$conexion->query("insert into cajas(instrucciones, texto_caja, id_exam, grupo_cajas) values ('$instruccion',  '$txtcaja',  2,1 )");
			echo "SE AGREGO CORRECTAMENTE";
		}    
}
//}
?>

<!DOCTYPE html>
<html>



	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
		<title>Cajas dinamicas</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">

  		<link rel="stylesheet" href="css/estilos.css">
  		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
  		<link rel="stylesheet" href="css/font-awesome.min.css">

  		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
	    <script src="javascript/main.js" ></script>

	</head>
	<body>
	<?php
		include("menu_pagina.html");
	?>
		<center>

		<form id="form1" action="" method="POST" class="wrap">
		<label>Escribe aqui las	instrucciones:</label> <input type="text" name="txt_instrucciones" id="txt_instruccion">
		<label>Cuantas cajas requiere? </label><select id="num_caja"  name="num_cajas" onchange="createTexts(this)">
		<option value="" selected="selected">          </option>
        <?php
        for($i=2; $i<=15;$i++){
        echo "<option value='$i'>$i</option>";
        }
        ?> 
    </select><br>
    <div></div>
    <button class="boton" type="submit" form="form1" onsubmit="return validar();" name="guarda" value="Guardar">Guardar</button>
    <br>
    <button class="boton" type="submit" form="form1"   onsubmit="return validar();" onclick="formReset()" name="guarda_agrega" value="agregar"">Agregar serie de cajas</button>
    </form>
    </center>


	<script>
	function formReset(){
		document.getElementById("form1").reset();
	}


	function validar(){
		instruccion = document.getElementById("txt_instruccion").value;
		num_caja = document.getElementById("num_caja").selectedIndex;
		

		if(instruccion == null || instruccion.length == 0 || /^\s+$/.test(instruccion)){
			alert("Verificar el campo de instrucciones");
			return false;

		} else if(num_caja == null || num_caja == 0 ){
			alert("Seleccione el numero de cajas que va a requerir");
			return false;
		}
	}

	function addInstrucciones(){
	
		var textBoxTexto = document.getElementById("txt_preg").value;
		var etiqueta=document.createElement("label");	
		var texth1 = document.createTextNode(textBoxTexto);
		etiqueta.appendChild(texth1);
		document.body.appendChild(etiqueta);	
		}


		idtxt=0;

		function createTexts(sel) {
			var num = sel.text;
			if( !num ) num = sel.options[sel.selectedIndex].text;
			if( !num ) return;
			num = parseInt( num );
			num = isNaN(num) ? 0 : num;
			sel.value = num;
			var dest = sel.parentNode.getElementsByTagName("div")[0];
			dest.innerHTML = '';
			idtxt=0;
			for( i = 0; i < num; i++ ) {
				idtxt++;
				dest.innerHTML += "<br><input type='text' name='text"+idtxt+"' id="+idtxt+" /><br>";
			}
		}
	</script>

	<?php /*
}else{
	header("location: sinSesion.html");
}*/
?>	

</body>
</html>