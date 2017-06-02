<?php 
session_start();
if(isset($_SESSION['sun'])){



if(isset($_POST['Guardar'])){
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
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
		include("menu_pagina.php");
	?>
		<center>
		<form name="form1" action="" method="POST" class="wrap">
			<p>	Instrucciones: <input type="text" name="txt_pregunta" id="txt_preg"></p>
    		<!--<button type="button" form="form1" onclick="addInstrucciones()" value="Agregar">Agregar</button><br>-->
    		<br>
    		<label>Cuantas cajas requiere? </label>
    		<br>
    		<select name="select1" onchange="createTexts(this)">
    			<option value="" selected="selected">          </option>
        		<?php
        		for($i=2; $i<=15;$i++){
        		echo "<option value='$i'>$i</option>";
        		}
        		?> 
    		</select><br>
    		<div></div>
    		<br>
    		<button class="boton" type="submit" form="form1"  value="Guardar">Guardar</button>
    		<br>
    		<button  class="boton" type="submit" form="form1"  onclick="formReset()" value="NuevaPreg">Agregar serie de cajas</button>
		</form>
		</center>

	<script>
	function formReset(){
		document.getElementById("form1").reset();
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
				var html="<br><input type='text' name='caja_de_texto[]' id="+idtxt+"/><br>";
				num = parseInt( num );
				num = isNaN(num) ? 0 : num;
				sel.value = num;
				var dest = sel.parentNode.getElementsByTagName("div")[0];
				dest.innerHTML = '';
				for( i = 0; i < num; i++ ) {
					dest.innerHTML += html;
				}
				idtxt++;

}
	</script>
	<?php
}else{
	header("location: sinSesion.html");
}
?>	
</body>
</html>